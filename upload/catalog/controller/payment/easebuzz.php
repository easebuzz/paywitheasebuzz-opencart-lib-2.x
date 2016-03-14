<?php

/*
* ver. 1.0.1
* EasebzzPayment Modules
*
* @copyright  Copyright 2016 by Easebuzz
* @license    http://opensource.org/licenses/GPL-3.0  Open Software License (GPL 3.0)
* 
* 
*/

class ControllerPaymentEasebuzz extends Controller
{
    
    const PAY_BUTTON = 'image/pay01.png';
    
    public function index()
    {
        $data['easebuzz_button'] = self::PAY_BUTTON;
        $data['action'] = $this->url->link('payment/easebuzz/pay');
        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/easebuzz.tpl')) {
            return $this->load->view($this->config->get('config_template') . '/template/payment/easebuzz.tpl', $data);
        } else {
            return $this->load->view('payment/easebuzz.tpl', $data);
        }
    }
    
    public function pay()
    {
        
        if ($this->session->data['payment_method']['code'] == 'easebuzz') {
            require_once(DIR_SYSTEM . 'helper/easebuzz-lib.php');
            $this->language->load('payment/easebuzz');
            $this->load->model('checkout/order');
            
            $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
            
            $SALT=trim($this->config->get('easebuzz_merchant_salt')); 
            $MERCHANT_KEY=trim($this->config->get('easebuzz_merchant_key')); 
            $ENV=trim($this->config->get('easebuzz_payment_mode')); 
            
            $res=easepay_page(array('key' => $MERCHANT_KEY,
                    'txnid' => date('His') . $this->session->data['order_id'],
                    'amount' => $this->currency->format($order_info['total'], $order_info['currency_code'] , false, false),
                    'firstname' => html_entity_decode($order_info['firstname'] . $order_info['lastname'], ENT_QUOTES, 'UTF-8'),
                    'email' => $order_info['email'],
                    'phone' => html_entity_decode($order_info['telephone'], ENT_QUOTES, 'UTF-8'),
                    'productinfo' =>$this->session->data['order_id'],
                    'surl' =>  $this->url->link('payment/easebuzz/callback'),
                    'furl' => $this->url->link('payment/easebuzz/callback')), $SALT, $ENV);
            echo json_encode($res);
        }
    }
    public function callback() {
        
        $data = array_merge($this->request->post, $this->request->get);
        try {
            if (empty($data)) {
                die('No parameter found');
            }

            if (isset($this->request->post['txnid'])) {
                $order_id = trim(substr(($this->request->post['txnid']), 6));
            } else {
                die('Illegal Access');
            }

            $this->load->model('checkout/order');
            $order_info = $this->model_checkout_order->getOrder($order_id);
            if ($order_info) {
                if($data["status"]=="success"){
                    $this->model_checkout_order->addOrderHistory($order_info['order_id'], $this->config->get('easebuzz_complete_status'));
                    $this->response->redirect($this->url->link('checkout/success', '', true));
                }else{   
                    $this->model_checkout_order->addOrderHistory($order_info['order_id'], $this->config->get('easebuzz_cancelled_status'));
                    $this->response->redirect($this->url->link('checkout/failure', '', true));
                }
            }
        }catch (Exception $e) {
            $this->logger->write('OCR Notification: ' . $e->getMessage());
        }
    }

}
