<?php namespace App\Modules\Helloworld\Utils;

use App\Models\Setting;
use DB;
use Illuminate\Database\Schema\Blueprint;
use Schema;
use Sroutier\LESKModules\Contracts\ModuleMaintenanceInterface;
use Sroutier\LESKModules\Traits\MaintenanceTrait;

class HelloworldMaintenance implements ModuleMaintenanceInterface
{

    use MaintenanceTrait;


    static public function initialize()
    {
        DB::transaction(function () {

            /////////////////////////////////////////////////
            // Build database or run migration.
//            self::buildDB();
//            self::migrate('helloworld');

            /////////////////////////////////////////////////
            // Seed the database.
//            self::seed('helloworld');


            //////////////////////////////////////////
            // Create permissions.
            $permUseHelloworld = self::createPermission(  'use-helloworld',
                'Use the Helloworld module',
                'Allows a user to use the Helloworld module.');
            ///////////////////////////////////////
            // Register routes.
            $routeHome = self::createRoute( 'helloworld.index',
                'helloworld',
                'App\Modules\Helloworld\Http\Controllers\HelloworldController@index',
                $permUseHelloworld );

            ////////////////////////////////////
            // Create roles.
            self::createRole( 'helloworld-users',
                'Helloworld Users',
                'Users of the Helloworld module.',
                [$permUseHelloworld->id] );

            ////////////////////////////////////
            // Create menu system for the module
            $menuToolsContainer = self::createMenu( 'tools-container', 'Tools', 10, 'fa fa-folder', 'home', true );
            self::createMenu( 'helloworld.index', 'Helloworld', 0, 'fa fa-file', $menuToolsContainer, false, $routeHome );
        }); // End of DB::transaction(....)
    }


    static public function unInitialize()
    {
        DB::transaction(function () {

            self::destroyMenu('helloworld.index');
            self::destroyMenu('tools-container');

            self::destroyRole('helloworld-users');

            self::destroyRoute('helloworld.index');

            self::destroyPermission('use-helloworld');

            /////////////////////////////////////////////////
            // Destroy database or rollback migration.
//            self::rollbackMigration('helloworld');
//            self::destroyDB();

        }); // End of DB::transaction(....)
    }


    static public function enable()
    {
        DB::transaction(function () {
            self::enableMenu('helloworld.index');
        });
    }


    static public function disable()
    {
        DB::transaction(function () {
            self::disableMenu('helloworld.index');
        });
    }


    static public function buildDB()
    {
        // Add code to build database and tables as needed.
    }


    static public function destroyDB()
    {
        // Add code to destroy database and tables as needed.
    }

}