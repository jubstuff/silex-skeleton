<?php
use Symfony\Component\HttpFoundation\Request;

$app->get('/', function() use ($app) {
    return $app['twig']->render('home.twig');
})
->bind('home');

$app->get('/about', function() use ($app) {
    return $app['twig']->render('about.twig');
})->bind('about');

$app->match('/contact', function(Request $request) use ($app) {
    $data = array(
        'name' => 'Your name',
        'email' => 'Your email',
        'message' => 'Your message',
    );

    $form = $app['form.factory']->createBuilder('form', $data)
        ->add('name')
        ->add('email')
        ->add('message')
        ->getForm();

    $form->handleRequest($request);

    if($form->isValid()) {
        $data = $form->getData();

        //TODO manage form data

        return $app->redirect('/');
    }

    return $app['twig']->render('contact.twig', array('form' => $form->createView()));
})->bind('contact');
