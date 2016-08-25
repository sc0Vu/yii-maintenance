<?php

/**
 * maintenance filter
 * return 503 or maintenance view if turn on maintenance
 * 
 * @author Peter Lai <alk03073135@gmail.com>
 * @since  20160825
 */
class MaintenanceFilter extends CFilter
{
    /**
     * returnView
     * 
     * @var boolean
     */
    public $returnView = false;

    /**
     * viewFile
     * 
     * @var string
     */
    public $viewFile = '';

    /**
     * maintenanceMessage
     * 
     * @var string
     */
    public $maintenanceMessage = 'Sorry, we are under maintenance, please come here lately!';

    /**
     * maintenance
     * 
     * @var boolean
     */
    public $maintenance = false;

    /**
     * preFilter
     * 
     * @param  CFilterChain $filterChain
     * @return boolean
     */
    protected function preFilter($filterChain)
    {
        if ($this->maintenance === false) {
            return true;
        }
        if ($this->returnView === false) {
            var_dump($this->maintenance);
        exit();
            throw new CHttpException(503, $this->maintenanceMessage);
        }
        if (empty($this->viewFile)) {
            throw new CHttpException(503, $this->maintenanceMessage);
        }

        $view = $filterChain->getViewFile($this->viewFile);

        if ($view === false) {
            throw new CHttpException(503, $this->maintenanceMessage);
        }
        echo $view;
        return false;
    }

    /**
     * postFilter
     * 
     * @param  CFilterChain $filterChain
     * @return void
     */
    protected function postFilter($filterChain)
    {}
}