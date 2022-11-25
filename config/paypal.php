<?php
define('ProPayPal', 0);
if (ProPayPal) {
    define("PayPalClientId", "AbCyzXOhfX5TWgGeMbAxlT71VnHBBm2wSC-khZD9hZ2krNoMTxZLKVsZuBv6BB1LVn1o1O9UX8ZTnB8z");
    define("PayPalSecret", "EGzfViYeLDbUhklHPenm85GROX0RXzkajmR27GTRnHK1bVKVQjpf_-8_uaflvqQZnEgDtgd04EuSKAwX");
    define("PayPalBaseUrl", "http://localhost/aico/views/");
    define("PayPalENV", "production");
} else {
    define("PayPalClientId", "AbCyzXOhfX5TWgGeMbAxlT71VnHBBm2wSC-khZD9hZ2krNoMTxZLKVsZuBv6BB1LVn1o1O9UX8ZTnB8z");
    define("PayPalSecret", "EGzfViYeLDbUhklHPenm85GROX0RXzkajmR27GTRnHK1bVKVQjpf_-8_uaflvqQZnEgDtgd04EuSKAwX");
    define("PayPalBaseUrl", "http://localhost/aico/views/");
    define("PayPalENV", "sandbox");
}