<script>
    function ListManager()
    {
        showSwal("Yükleniyor...", "info");

        let data = new FormData();
        request("{{ API('route_listFiles') }}", data, function (response) {
            // Başarılıysa
            $("#id_file_list").html(response).find(".table").dataTable(dataTablePresets("normal"));
            Swal.close();
        }, function (error) {
            // Başarısızsa
            console.log(error);
        });
    }

function newFileCreate(){

let data=new FormData();
data.append("create_file_remote",$("id_create_file").find("input[name=create_file_remote]").val());
console.log(input[name=create_file_remote]).val()


request("{{API('route_create_files')}}",data,function(response) {
   
response=JSON.parse(response);
$("#id_create_file").modal("hide");
});

}




$(".create_file").on("click",  function(event) {


});

</script>