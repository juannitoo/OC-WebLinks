<?php

// Home page
$app->get('/', function () use ($app) {
    $links = $app['dao.link']->findAll();
    //$user = $app['dao.user']->findName(2);
    return $app['twig']->render('index.html.twig', array('links' => $links));
});
