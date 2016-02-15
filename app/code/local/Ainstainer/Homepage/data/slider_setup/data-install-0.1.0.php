<?php

$slides = array(
    array(
        'url' => 'http://localhost:8080/magick/media/wysiwyg/eden_nebula-wallpaper-1366x768.jpg',
        'description' => 'eden_nebula-wallpaper-1366x768.jpg',
        'title' => 'disabled first',
        'image' => '',
        'status' => 0,
        'position' => 0,
    ),
    array(
        'url' => 'http://localhost:8080/magick/media/wysiwyg/follow_me-wallpaper-1366x768.jpg',
        'description' => 'follow_me-wallpaper',
        'title' => 'enabled second',
        'image' => '',
        'status' => 1,
        'position' => 1,
    )
);

foreach($slides as $slide) {
    Mage::getModel('homepage/slider')->setData($slide)->save();
}