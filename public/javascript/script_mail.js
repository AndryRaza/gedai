$(document).ready(function() {

   document.getElementById('store_pdf').addEventListener('click',ExportPdf);

    function ExportPdf() {
        kendo.drawing
          .drawDOM("#laravel_datatable",
            {
              paperSize: "A4",
              margin: { top: "1cm", bottom: "1cm" },
              scale: 0.8,
              height: 500
            })
          .then(function (group) {
            kendo.drawing.pdf.saveAs(group, "Exported.pdf")
          });
      }
  })