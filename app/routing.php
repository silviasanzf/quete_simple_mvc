<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, method
        ['add', '/Item/add', ['GET', 'POST']], // action, url, method
        ['edit', '/Item/edit/{id:\d+}', ['GET', 'POST']], // action, url, method
        ['show', '/Item/{id:\d+}', 'GET'], // action, url, method
        ['delete', '/Item/delete/{id:\d+}', 'GET'], // action, url, method
    ],

    'Category' => [ // Controller
        ['index', '/categories', 'GET'], // action, url, HTTP method
        ['show', '/category/{id}','GET'], // action, url, HTTP method
    ],

];