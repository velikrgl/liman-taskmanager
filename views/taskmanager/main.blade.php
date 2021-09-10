<div id="task_list">

</div>

@component("modal-component", [
    "id" => "fileLocationModal",
    "title" => "Dosya Konumu",
    "notSized" => "true"
])
<div id="fileLocationContent"></div>
@endcomponent

@component("modal-component", [
    "id" => "modal_service_status",
    "title" => "Servisin Durumu",
    "notSized" => "true"
])
<pre id="serviceStatusContent"></pre>
@endcomponent


@component("modal-component", [
    "id" => "modal_command_argu",
    "title" => "Çalıştırma Argümanları",
    "notSized" => "true"
])
<pre id="commandArgu"></pre>
@endcomponent

@component("modal-component", [
    "id" => "modal_pstree",
    "title" => "İşlem Ağacı",
    "notSized" => "true"
])
<pre id="pstree_id"></pre>
@endcomponent



@include("taskmanager.scripts") 
