<?php
/*
* Easebuzz Payment Modules
*
* @copyright  Copyright 2015 by Easebuzz
* @license    http://opensource.org/licenses/GPL-3.0  Open Software License (GPL 3.0)
* 
*/

class ModelPaymentEasebuzz extends Model
{
    public function getMethod($address, $total)
    {
        $this->load->language('payment/easebuzz');
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('easebuzz_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");

        if ($this->config->get('easebuzz_total') > 0 && $this->config->get('easebuzz_total') > $total) {
            $status = false;
        } elseif (!$this->config->get('easebuzz_geo_zone_id')) {
            $status = true;
        } elseif ($query->num_rows) {
            $status = true;
        } else {
            $status = false;
        }

        $method_data = array();
        if ($status) {
            $method_data = array(
                'code' => 'easebuzz',
                'title' => $this->language->get('text_title'),
                'terms' => '',
                'sort_order' => $this->config->get('easebuzz_sort_order')
            );
        }
        return $method_data;
    }

}
