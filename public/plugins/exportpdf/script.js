(function ($) {

    $('#export_btn').click(function () {
        var exportView = $('#export_view');
        $(window).scrollTop(0);
        var useHeight = exportView.prop('scrollHeight');
        //remove class thumb-img
        exportView.find('.product .item-thumb-col>a').each(function () {
            $(this).removeClass('thumb-img');
            var img = $(this).find('img');
            var imgSrc = img.attr('src');
            img.attr('data-img', imgSrc);
            img.attr('src', proxyUrl + '?url='+imgSrc);
        });

        html2canvas(exportView[0], {
            useCORS: true,
            height: useHeight,
            proxy: proxyUrl,
            onrendered: function (canvas) {
                var pdf = new jsPDF('p', 'pt', 'letter');
                var hpPage = 980; //height per page
                var wpPage = 920; //width per page

                for (var i = 0; i <= exportView[0].clientHeight / hpPage; i++) {
                    //! This is all just html2canvas stuff
                    var srcImg = canvas;
                    var sX = 0;
                    var sY = hpPage * i; // start 980 pixels down for every new page
                    var sWidth = hpPage;
                    var sHeight = hpPage;
                    var dX = 0;
                    var dY = 0;
                    var dWidth = wpPage;
                    var dHeight = hpPage;

                    window.onePageCanvas = document.createElement("canvas");
                    onePageCanvas.setAttribute('width', wpPage);
                    onePageCanvas.setAttribute('height', hpPage);
                    var ctx = onePageCanvas.getContext('2d');
                    // details on this usage of this function: 
                    ctx.drawImage(srcImg, sX, sY, sWidth, sHeight, dX, dY, dWidth, dHeight);

                    // document.body.appendChild(canvas);
                    var canvasDataURL = onePageCanvas.toDataURL("image/png", 1.0);

                    var width = onePageCanvas.width;
                    var height = onePageCanvas.clientHeight;

                    //! If we're on anything other than the first page,
                    // add another page
                    if (i > 0) {
                        pdf.addPage(612, 791); //8.5" x 11" in pts (in*72)
                    }
                    //! now we declare that we're working on that page
                    pdf.setPage(i + 1);
                    //! now we add content to that page!
                    pdf.addImage(canvasDataURL, 'PNG', 20, 40, (width * .62), (height * .62));

                }
                //! after the for loop is finished running, we save the pdf.
                pdf.save(pdfFileName + '.pdf');
            }
        });

        //add class thumb-img
        setTimeout(function () {
            exportView.find('.product .item-thumb-col>a').each(function () {
                $(this).addClass('thumb-img');
                var img = $(this).find('img');
                var imgSrc = img.attr('data-img');
                if (typeof imgSrc != 'undefined') {
                    img.attr('src', imgSrc);
                }
            });
        }, 700);
    });

})(jQuery);
