<script>
    function taskManager()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('task_manager_list') }}", data, function (response) {
            // Başarılıysa
            $("#task_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetFileLocation(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('get_file_location') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#fileLocationModal").modal("show");
            $("#fileLocationContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsGetServiceStatus(node)
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("service", $(node).find("#service").html())
        request("{{ API('get_service_status') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            console.log("servis durumu fonksiyonu");
            $("#modal_service_status").modal("show");
            $("#serviceStatusContent").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });

    }

    function jsGetCOmmandArgu(node)
    {
        showSwal("Yükleniyor...", "info");
        
        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('route_command_argu') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#modal_command_argu").modal("show");
            $("#commandArgu").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }


    
    function psTree(node)
    {

      
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('route_getprocessTree') }}", data, function (response) {
            // Başarılıysa
            response = JSON.parse(response);
            $("#modal_pstree").modal("show");
            $("#pstree_id").html(response.message);
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

    function jsProcessKiller(node)
    {

      
        showSwal("İşlem sonlandırıldı ", "info",2500);   

        let data = new FormData();
        data.append("pid", $(node).find("#pid").html())
        request("{{ API('route_killProcess') }}", data, function (response) {
            // Başarılıysa
             
            Swal.close();
           
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
        
    }

    function jsProcessAllKiller(node)
    {

      
        showSwal("Bütün İşlemler sonlandırıldı ", "info",2500);   

        let data = new FormData();
        data.append("command", $(node).find("#command").html())
        request("{{ API('route_killAllProcess') }}", data, function (response) {
            // Başarılıysa
          
            
            Swal.close();
           
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
        
    }



</script>