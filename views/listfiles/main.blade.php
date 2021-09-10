<div id="id_file_list">

</div>




@include("modal-button", [
    "text" => "Dosya Oluştur",
    "class" => "btn-success create_file",
    "target_id" => "id_create_file"
])

@component("modal-component", [
    "id" => "id_create_file",
    "title" => "Dosya Oluştur",
    "notSized" => "true",
    "modalDialogClasses" => "classExample",
    "footer" => [
        "class" => "btn-success create_file",
        "onclick" => "newFileCreate()",
        "text" => "Oluştur"
    ]
]) 


<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Dosya Adı:</span>
  </div>
  <input type="text" name= "create_file_remote" class="form-control" placeholder="Dosya Adını Giriniz..." >
</div>
@endcomponent

    


@include("listfiles.scripts")