<?php
/**
 * Desyncr\Oxy
 *
 * PHP version 5.4
 *
 * @category General
 * @package  Desyncr\Oxy
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @version  GIT:<>
 * @link     https://github.com/desyncr
 */
namespace Desyncr\Oxy;

use Zend\Mvc\Router\RouteStackInterface;
use Zend\Stdlib\RequestInterface;
use Zend\Mvc\Router\Http\RouteMatch;

/**
 * Class Router
 *
 * @category General
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
class Router implements RouteStackInterface
{
    /**
     * @var array
     */
    protected $routes = array();

    /**
     * Match a given request.
     *
     * @param  \Zend\Stdlib\RequestInterface $request
     *
     * @return \Zend\Mvc\Router\RouteMatch|null
     */
    public function match(RequestInterface $request)
    {
        $params = $request->getContent();

        foreach ($this->routes as $route) {
            if ($route['action'] === $params[0]) {
                return new RouteMatch($route);
            }
        }
        return null;
    }

    /**
     * get
     *
     * @param $route
     * @param $resource
     *
     * @return mixed
     */
    public function get($route, $resource)
    {
        $route = $route == '/' ? 'index' : $route;
        array_push($this->routes, array('action' => $route, 'controller' => $resource));
    }

    /**
     * Create a new route with given options.
     *
     * @param  array|\Traversable $options
     *
     * @return void
     */
    public static function factory($options = array())
    {
        // TODO: Implement factory() method.
    }

    /**
     * Assemble the route.
     *
     * @param  array $params
     * @param  array $options
     *
     * @return mixed
     */
    public function assemble(array $params = array(), array $options = array())
    {
        // TODO: Implement assemble() method.
    }

    /**
     * Add a route to the stack.
     *
     * @param  string $name
     * @param  mixed  $route
     * @param  int    $priority
     *
     * @return RouteStackInterface
     */
    public function addRoute($name, $route, $priority = null)
    {
        // TODO: Implement addRoute() method.
    }

    /**
     * Add multiple routes to the stack.
     *
     * @param  array|\Traversable $routes
     *
     * @return RouteStackInterface
     */
    public function addRoutes($routes)
    {
        // TODO: Implement addRoutes() method.
    }

    /**
     * Remove a route from the stack.
     *
     * @param  string $name
     *
     * @return RouteStackInterface
     */
    public function removeRoute($name)
    {
        // TODO: Implement removeRoute() method.
    }

    /**
     * Remove all routes from the stack and set new ones.
     *
     * @param  array|\Traversable $routes
     *
     * @return RouteStackInterface
     */
    public function setRoutes($routes)
    {
        // TODO: Implement setRoutes() method.
    }
}