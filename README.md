# yii-maintenance
Yii filter to redirect user when turn on maintenance mode.
usage normal in controller
    public function filters()
    {
        return [
            [
                'pathTo/MaintenanceFilter',
                'maintenance' => true
            ],
        ];
    }
custome maintenance view
    public function filters()
    {
        return [
            [
                'pathTo/MaintenanceFilter',
                'maintenance' => true,
                'returnView' => true,
                'viewFile' => 'alias.to.view',  // eg, application.views.error.maintenance
            ],
        ];
    }
Have fun!
