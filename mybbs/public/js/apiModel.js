class DataCountModel {

    constructor() {
    }
}

function createApiFormData() {
    var token = this.apiToken = document.getElementById("apiToken").value;
    const formData = new FormData()
    formData.append('apiToken', token);
    return formData;
}

class MaintApiRequestModel {

    constructor() {

        // pagenation
        this.pageSize = 10;
    }
}