<?php

namespace PluginName\Services;

require_once PLGUIN_AUTOLOADER_DIR;

/**
 * Register all actions and filters for the plugin.
 */
class Loader
{
    protected $actions;

    protected $filters;
    
    protected $wpLoad;

    public function __construct()
    {
        $this->actions = array();
        $this->filters = array();
        $this->wpLoad = new \PluginName\Adapter\WpLoad();
    }

    /**
     * Add a new action to the collection to be registered with WordPress.
     *
     * @since    1.0.0
     * @param    string               $hook             The name of the WordPress action that is being registered.
     * @param    object               $component        A reference to the instance of the object on which the action is defined.
     * @param    string               $callback         The name of the function definition on the $component.
     * @param    int                  $priority         Optional. The priority at which the function should be fired. Default is 10.
     * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1.
     */
    public function addAction($hook, $component, $callback, $priority = 10, $acceptedArgs = 1)
    {
        $this->actions = $this->add($this->actions, $hook, $component, $callback, $priority, $acceptedArgs);
    }

    /**
     * Add a new filter to the collection to be registered with WordPress.
     *
     * @since    1.0.0
     * @param    string               $hook             The name of the WordPress filter that is being registered.
     * @param    object               $component        A reference to the instance of the object on which the filter is defined.
     * @param    string               $callback         The name of the function definition on the $component.
     * @param    int                  $priority         Optional. The priority at which the function should be fired. Default is 10.
     * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1
     */
    public function addFilter($hook, $component, $callback, $priority = 10, $acceptedArgs = 1)
    {
        $this->filters = $this->add($this->filters, $hook, $component, $callback, $priority, $acceptedArgs);
    }

    /**
     * A utility function that is used to register the actions and hooks into a single
     * collection.
     *
     * @since    1.0.0
     * @access   private
     * @param    array                $hooks            The collection of hooks that is being registered (that is, actions or filters).
     * @param    string               $hook             The name of the WordPress filter that is being registered.
     * @param    object               $component        A reference to the instance of the object on which the filter is defined.
     * @param    string               $callback         The name of the function definition on the $component.
     * @param    int                  $priority         The priority at which the function should be fired.
     * @param    int                  $accepted_args    The number of arguments that should be passed to the $callback.
     * @return   array                                  The collection of actions and filters registered with WordPress.
     */
    private function add($hooks, $hook, $component, $callback, $priority, $acceptedArgs)
    {
        $hooks[] = array(
            'hook'          => $hook,
            'component'     => $component,
            'callback'      => $callback,
            'priority'      => $priority,
            'accepted_args' => $acceptedArgs
        );
        return $hooks;
    }

    /**
     * Register the filters and actions with WordPress.
     *
     * @since    1.0.0
     */
    public function run()
    {
        foreach ($this->filters as $hook) {
            $this->wpLoad->addFilter($hook['hook'], [$hook['component'], $hook['callback']], $hook['priority'], $hook['accepted_args']);
        }

        foreach ($this->actions as $hook) {
            $this->wpLoad->addAction($hook['hook'], [$hook['component'], $hook['callback']], $hook['priority'], $hook['accepted_args']);
        }
    }
}