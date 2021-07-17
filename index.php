<?php

    /**
     * inisialisasi
     *      start session
     *          agar dapat menyimpan sesi login
     */
    session_start();

    /**
     * mengimport file autoload
     *      agar library pada 📁vendor dapat digunakan 
     */
    require_once './vendor/autoload.php';

    
    use App\Controller\HomeController;

    use Symfony\Component\Routing\Matcher\UrlMatcher;
    use Symfony\Component\Routing\RequestContext;
    use Symfony\Component\Routing\RouteCollection;
    use Symfony\Component\Routing\Route;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Generator\UrlGenerator;
    use Symfony\Component\Routing\Exception\ResourceNotFoundException;

    try
    {
        // Init basic route
        $home_route = new Route(
            '/sdfatufeto2',
            array('controller' => HomeController::class)
        );
    
        // Init route with dynamic placeholders
        // $foo_placeholder_route = new Route(
        //     '/foo/{id}',
        //     array('controller' => HomeController::class, 'method' => 'index'),
        //     array('id' => '[0-9]+')
        // );
    
        // Add Route object(s) to RouteCollection object
        $routes = new RouteCollection();
        $routes->add('home', $home_route);
        // $routes->add('foo_placeholder_route', $foo_placeholder_route);
    
        // Init RequestContext object
        $context = new RequestContext();
        $context->fromRequest(Request::createFromGlobals());
    
        // Init UrlMatcher object
        $matcher = new UrlMatcher($routes, $context);
    
        // Find the current route
        $parameters = $matcher->match($context->getPathInfo());
    
        // How to generate a SEO URL
        // $generator = new UrlGenerator($routes, $context);
        // $url = $generator->generate('foo_placeholder_route', array(
        //     'id' => 123,
        // ));
    
        // echo '<pre>';
        // print_r($parameters);
    
        // echo 'Generated URL: ' . $url;
        exit;
    } catch (ResourceNotFoundException $e){
        echo $e->getMessage();
    }