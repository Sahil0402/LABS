const labels = document.getElementsByClassName("result-label");

$("#sortBtn").click(function () {

    if ($("#inputArray").val().trim() != "") {
        labels[0].style.display = "block";
        labels[0].innerHTML = "Sorted Array: ";
        let inputArray = $("#inputArray").val().split(",");
        let sortedArray = inputArray.sort(function (a, b) {
            return a - b;
        });
        $("#sortedArray").html(sortedArray.join(", "));
    }
    else {
        labels[0].style.display = "block";
        labels[0].innerHTML = "Enter valid set of numbers";
    }
});

$("#searchBtn").click(function () {
    if ($("#inputArray").val().trim() !== "") {
        labels[1].style.display = "block";
        let inputArray = $("#inputArray").val().split(",").map(Number);
        let searchElement = $("#searchElement").val();
        if (searchElement === "") {
            labels[1].innerHTML = "Enter the number to be searched";
        }
        else {
            let searchIndex = inputArray.indexOf(Number(searchElement));
            if (searchIndex === -1) {
                labels[1].innerHTML = "Element not found in array.";
            } else {
                labels[1].innerHTML = "Element found at index " + searchIndex + ".";
            }
        }
    } else {
        labels[1].style.display = "block";
        labels[1].innerHTML = "No array found!";
    }

});

$("#namedEntityBtn").click(function () {
    if ($("#inputNamedEntities").val().trim() !== "") {
        labels[2].style.display = "block";
        let inputNamedEntities = $("#inputNamedEntities").val().split(",");
        $("#namedEntities").empty();
        for (let i = 0; i < inputNamedEntities.length; i++) {
            if (i === inputNamedEntities.length - 1) {
                $("#namedEntities").append(inputNamedEntities[i]);
            } else {
                $("#namedEntities").append(inputNamedEntities[i] + ", ");
            }
        }
    }else {
        labels[2].style.display = "block";
        labels[2].innerHTML = "No strings found!";
    }

});
