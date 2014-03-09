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

use Zend\Mvc\Application as MvcApplication;
use Zend\Mvc\Router\RouteStackInterface;

/**
 * Class Application
 *
 * @category General
 * @package  Desyncr\Oxy
 * @author   Dario Cavuotti <dc@syncr.com.ar>
 * @license  https://www.gnu.org/licenses/gpl.html GPL-3.0+
 * @link     https://github.com/desyncr
 */
class Application
{
    /**
     * @var
     */
    protected $app;

    /**
     * @var
     */
    protected $config;

    /**
     * @var
     */
    protected $router;

    /**
     * init
     *
     * @param array $config
     *
     * @return \Desyncr\Oxy\Application
     */
    static public function init(array $config = null)
    {
        $config = $config ?: require_once __DIR__ . '/../../../../../config/application.config.php';
        return new Application($config);
    }

    /**
     * constructor
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->setConfig($config);
        $app = MvcApplication::init($config);
        $this->setApplication($app);
    }

    /**
     * setConfig
     *
     * @param $config
     *
     * @return null
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * setRouter
     *
     * @param RouteStackInterface $router
     *
     * @return MvcApplication
     */
    public function setRouter(RouteStackInterface $router)
    {
        $event = $this->getApplication()->getMvcEvent();
        $event->setRouter($router);

        return $this->getApplication();
    }

    /**
     * getRouter
     *
     * @return RouteStackInterface
     */
    public function getRouter()
    {
        $event = $this->getApplication()->getMvcEvent();
        $event->getRouter();
    }

    /**
     * setApplication
     *
     * @param MvcApplication $app
     *
     * @return mixed
     */
    public function setApplication(MvcApplication $app)
    {
        $this->app = $app;
    }

    /**
     * getApplication
     *
     * @return MvcApplication
     */
    public function getApplication()
    {
        return $this->app;
    }
}
 