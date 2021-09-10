<?php

return [
    "index" => "HomeController@index",

    // Tasks
    "runTask" => "TaskController@runTask",
    "checkTask" => "TaskController@checkTask",

    // Hostname Settings
    "get_hostname" => "HostnameController@get",
    "set_hostname" => "HostnameController@set",

    // Systeminfo
    "get_system_info" => "SystemInfoController@get",
    "install_lshw" => "SystemInfoController@install",

    // Runscript
    "run_script" => "RunScriptController@run",

    // TaskView
    "example_task" => "TaskViewController@run",

    // Task Manager Routes
    "task_manager_list" => "TaskManagerController@getList",
    "get_file_location" => "TaskManagerController@getFileLocation",
    "get_service_status" => "TaskManagerController@service_status",
    "route_command_argu"   => "TaskManagerController@getcommandArgu",
    "route_getprocessTree" => "TaskManagerController@getprocessTree",
    "route_killProcess"   => "TaskManagerController@killProcess",
    "route_killAllProcess" => "TaskManagerController@killAllProcess",
    //ListFiles Routes
    "route_listFiles" => "ListFilesController@list_files",
    "route_create_files" =>"ListFilesController@createFile"

];
