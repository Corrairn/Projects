$(function() {
  var featured = [
    {
      name: "HP laptop sdj324235",
      img: "l1.jpg",
      description: "The coolest laptop ever..."
    },
    {
      name: "HP laptop sdj34g5",
      img: "l2.jpg",
      description: "The coolest laptop ever..."
    },
    {
      name: "HP laptop asf434",
      img: "l3.jpg",
      description: "The coolest laptop ever..."
    },
  ];

  for (var i = 0; i < featured.length; i++) {
    var currentProduct = featured[i];
    var htmlEl = $("<div class='product-slide'>");
    var imgSrc = 'images/' + currentProduct.img;
    var imgEl = $("<img src='" + imgSrc + "'>");
    var heading = $("<h1>").text(currentProduct.name);
    htmlEl.append(heading);
    htmlEl.append(imgEl);
    $("#featured").append(htmlEl);
  }

  $("#featured").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true
  });
});
