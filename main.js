loadData();
let actionBtn = "Insert";
$("#AddNew").click(function() {
    $("#studentModal").modal("show");



});


$("#StudentForm").submit(function(event) {

    event.preventDefault();

    let form_Data = new FormData($("#StudentForm")[0]);


    if (actionBtn == "Insert") {

        form_Data.append("action", "RegisterStudent");

    } else {
        form_Data.append("action", "UpdateStudent");

    }


    $.ajax({

        method: "POST",
        dataType: "JSON",
        url: "api.php",
        data: form_Data,
        contentType: false,
        processData: false,

        success: function(data) {
            let status = data.status;
            let response = data.data;

            alert(response);
            actionBtn == "Insert"
            loadData();
            $("#StudentForm")[0].reset();
            $("#studentModal").modal("hide");



        },
        error: function(data) {
            console.log(data);

        }

    });
});

function loadData() {
    $("#studentTable tbody ").html("");



    let SendingData = {
        "action": "readall",
    }

    $.ajax({


        method: "POST",
        dataType: "JSON",
        url: "api.php",
        data: SendingData,

        success: function(data) {

            let status = data.status;
            let response = data.data;
            let tr = "";
            if (status) {

                response.forEach(item => {

                    tr += "<tr>";
                    for (let i in item) {

                        tr += `<td>${item[i]}</td>`;
                    }
                    tr += `<td><a class="btn btn-info m-1  update_info" update_id=${item['id']}><i  class="fas fa-edit  "></i></a><a class="btn btn-danger delete_info" delete_id=${item['id']}><i  class="fas fa-trash"></i></a></td>`;

                });

                $("#studentTable tbody").append(tr);
            }

        },
        error: function(data) {
            console.log(data);
        }


    });

}


function fetchData(id) {

    let SendingData = {

        "action": "readStudentInfo",
        "id": id


    }
    $.ajax({
        method: "POST",
        dataType: "JSON",
        url: "api.php",
        data: SendingData,
        success: function(data) {
            let status = data.status;
            let response = data.data;
            if (status) {

                $("#studentId").val(response[0].id);
                $("#studentName").val(response[0].name);
                $("#studentClass").val(response[0].class);
                $("#studentModal").modal("show");
                actionBtn = "Update";



            }
        },
        error: function(data) {

            console.log(data);
        }


    })

}

function deleteData(id) {
    let SendingData = {
        "action": "deletestudent",
        "studentId": id,
    }

    $.ajax({
        method: "POST",
        dataType: "JSON",
        url: "api.php",
        data: SendingData,
        success: function(data) {
            let status = data.status;
            let response = data.data;
            if (status) {

                alert(response);
                loadData();



            }
        },
        error: function(data) {

            console.log(data);
        }


    })


}

$("#studentTable tbody").on("click", "a.update_info", function() {
    let id = $(this).attr("update_id");
    fetchData(id);
});

$("#studentTable tbody").on("click", "a.delete_info", function() {
    let id = $(this).attr("delete_id");
    deleteData(id);
});