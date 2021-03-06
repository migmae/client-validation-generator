<?php namespace NpmWeb\ClientValidationGenerator\Laravel;

use Illuminate\Support\Manager;

class ClientValidationManager extends Manager {

    static $packageName = 'client-validation';

    /**
     * Create a new driver instance.
     *
     * @param  string  $driver
     * @return mixed
     */
    protected function createDriver($driver)
    {
        $clientValidationGenerator = parent::createDriver($driver);

        // any other setup needed

        return $clientValidationGenerator;
    }

    /**
     * Create an instance of the jQuery driver.
     *
     * @return \NpmWeb\ClientValidationGenerator\Laravel\JqueryValidationGenerator
     */
    public function createJqueryDriver()
    {
        return new JqueryValidationGenerator(
            $this->app['config']->get(self::$packageName.'.ruleMappings'),
            $this->app['config']->get(self::$packageName.'.packageName'),
            $this->app['config']->get(self::$packageName.'.functionName'),
            $this->app['config']->get(self::$packageName.'.options')
        );
    }

    /**
     * Get the default authentication driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        $driver = $this->app['config']->get(self::$packageName.'.driver');
        // var_dump($driver);exit;
        return $driver;
    }

    /**
     * Set the default authentication driver name.
     *
     * @param  string  $name
     * @return void
     */
    public function setDefaultDriver($name)
    {
        $this->app['config']->set(self::$packageName.'.driver', $name);
    }

}
