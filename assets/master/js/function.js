$(document).ready(function () {
    $('#kategori_nama').keyup(function() {
        var value = $(this).val();
        value = value.toLowerCase();
        value = value.replace(/[^a-zA-Z0-9]+/g,'-');

        $('#kategori_slug').val(value);
    });

    $('#judul_artikel').keyup(function() {
        var value2 = $(this).val();
        value2 = value2.toLowerCase();
        value2 = value2.replace(/[^a-zA-Z0-9]+/g,'-');

        $('#artikel_slug').val(value2);
    });

    $('#judul_halaman').keyup(function() {
      var value2 = $(this).val();
      value2 = value2.toLowerCase();
      value2 = value2.replace(/[^a-zA-Z0-9]+/g,'-');

      $('#halaman_slug').val(value2);
  });

    $('#image_artikel').on('input', function() {
        var file = $(this).get(0).files[0];

        if(file) {
          var reader = new FileReader();
          reader.onload = function() {
            $('#previewImg').attr("src", reader.result);
          }
          reader.readAsDataURL(file);
        }
    });

    $('#gambar_data').on('input', function() {
      var file = $(this).get(0).files[0];

      if(file) {
        var reader = new FileReader();
        reader.onload = function() {
          $('#previewImg2').attr("src", reader.result);
        }
        reader.readAsDataURL(file);
      }
    });

    $(".select2").select2();
});

tinymce.init({
  selector: 'textarea#basic-example',
  height: "480",
  force_p_newlines : true,
  forced_root_block : true,
  force_br_newlines : true,
  convert_newlines_to_brs : false,
  remove_linebreaks : true,
  style_formats: [
    // Adds the h1 format defined above to style_formats
    { title: 'My heading', format: 'h1' }
  ],
  plugins: [
      'advlist', 'autolink', 'lists', 'link', 'charmap', 'preview',
      'anchor', 'searchreplace', 'visualblocks', 'fullscreen',
      'insertdatetime','table', 'help', 'wordcount','jsplus_maps'
  ],
  toolbar: 'undo redo | blocks | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help'
});