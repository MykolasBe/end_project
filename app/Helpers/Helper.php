<?php

if (!function_exists('html_attr')){
    /**
     *funkc sugeneruoja html formos atributus is masyvo
     * @param array $array atributu masyvas
     * @return string grazina sudeta atributu stringa
     */
    function html_attr(array $array): string
    {
        $attributes = "";

        foreach ($array as $key => $attr) {
            if (strlen($key) > 1){
                $attributes .= " $key=\"$attr\"";
            } else {
                $attributes .= "$attr";
            }
        }
        return $attributes;
    }
}

if (!function_exists('input_attr')) {
    /**
     * F-cija generuoja input html atributus
     * @param $field_id
     * @param array $field
     * @return string
     */
    function input_attr($field_id ,array $field){
        return html_attr(($field['extra']['attr'] ?? []) +
            [
                'name' => $field_id,
                'type' => $field['type'],
                'value' => $field['value'] ?? ''
            ]);
    }
}

if (!function_exists('file_attr')) {
    /**
     * F-cija generuoja input html atributus
     * @param $field_id
     * @param array $field
     * @return string
     */
    function file_attr($field_id ,array $field){
        return html_attr(($field['extra']['attr'] ?? []) +
            [
                'name' => $field_id,
                'type' => $field['type'],
                'value' => $field['value'] ?? ''
            ]);
    }
}

if (!function_exists('select_attr')){
    /**
     * F-cija generuoja select atributus
     * @param $field_id
     * @param array $field
     * @return string
     */
    function select_attr(string $field_id, array $field): string
    {
        $attrs = $field['extra']['attr'] ?? [];
        if (in_array('multiple',$field['extra']['attr'])){
            $attrs += [
                'name' => $field_id . '[]',
            ];
        } else {
            $attrs += [
                'name' => $field_id,
            ];
        }

        return html_attr($attrs);
    }
}

if (!function_exists('option_attr')){
    /**
     * @param string $option_id
     * @param array $field
     * @return string
     */
    function option_attr(string $option_id, array $field): string
    {
        $attrs = [
            'value' => $option_id,
        ];

        if (is_array($field['value'])){
            foreach ($field['value'] as $value){
                if ($value == $option_id) {
                    $attrs['selected'] = true;
                }
            }
        } else {
            if ($field['value'] == $option_id) {
                $attrs['selected'] = true;
            }
        }

        return html_attr($attrs);
    }
}


if (!function_exists('radio_attr')){
    function radio_attr ($field_id, $option_id, array $field){
        return html_attr(($field['extra']['attr'] ?? []) + [
                'name' => $field_id,
                'type' => $field['type'],
                'value' => $option_id,
            ]);
    }
}

if (!function_exists('textarea_attr')){
    /**
     * F-cija generuoja textarea atributus
     * @param $field_id
     * @param array $field
     * @return string
     */
    function textarea_attr($field_id ,array $field){
        return html_attr(($field['extra']['attr'] ?? []) + ['name' => $field_id,]);
    }
}

if (!function_exists('button_attr')){
    /**
     * F-cija generuoja button atributus
     * @param $button_id
     * @param array $button
     * @return string
     */
    function button_attr($button_id ,array $button){
        return html_attr(($button['extra']['attr'] ?? []) +
            [
                'name' => 'action',
                'value' => $button_id,
            ]);
    }
}

