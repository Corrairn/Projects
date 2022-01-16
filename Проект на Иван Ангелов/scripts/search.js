$(function() {
  var products = [
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
    {
      name: "Huawei bla bla",
      img: "ph1.jpg",
      description: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
    },
    {
      name: "White android bla bla",
      img: "ph2.png",
      description: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
    },
    {
      name: "Black and ugly",
      img: "ph3.jpg",
      description: "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
    }
  ];

  var $products = $("#products");
  appendProducts(products);

  function appendProducts(products) {
    $("#products").html("");
    for (var i = 0; i < products.length; i++) {
      var currentProduct = products[i];
      var htmlProduct = createProductHtml(currentProduct);
      $products.append(htmlProduct);
    }
  }

  function createProductHtml(product) {
    var result = $("<div class='product-item clearfix'>");
    var heading= $("<h3 class='product-name'>").text(product.name);
    var productImg = $("<img src='" + "images/" + product.img + "'>");
    var desc = $("<div class='desc'>").text(product.description);
    $(result).append(heading).append(productImg).append(desc);
    return result;
  }

  $("#search-form").submit(function(e) {
    e.preventDefault();
    e.stopPropagation();
    var matches = [];
    var searchText = $("#search-input").val();
    for (var i = 0; i < products.length; i++) {
      var currentProduct = products[i];
      var nameToLower = currentProduct.name.toLowerCase();
      var isMatch = nameToLower.indexOf(searchText) >= 0;
      if(isMatch) matches.push(currentProduct);
    }

    appendProducts(matches);
  });

});
