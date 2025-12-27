document.addEventListener("DOMContentLoaded", function () {

    previewPhoto();
    getInsurances();
    $("select").select2();
});

function previewPhoto() {
    const input = document.getElementById("photo");
    if (!input) return;

    const label = document.querySelector('label[for="photo"]');
    const svg = label ? label.querySelector("svg") : null;
    const hint = label ? label.querySelector("span") : null;

    const preview = document.createElement("img");
    preview.alt = "Foto paciente";
    preview.className = "w-full h-48 object-cover rounded-md";
    preview.style.display = "none";

    if (label) label.appendChild(preview);

    input.addEventListener("change", function () {
        const file = input.files && input.files[0];
        if (!file) {
            preview.src = "";
            preview.style.display = "none";
            if (svg) svg.style.display = "";
            if (hint) hint.style.display = "";
            return;
        }

        if (!file.type.startsWith("image/")) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = "block";
            if (svg) svg.style.display = "none";
            if (hint) hint.style.display = "none";
        };
        reader.readAsDataURL(file);
    });

    const form = input.closest("form");
    if (form) {
        form.addEventListener("reset", function () {
            preview.src = "";
            preview.style.display = "none";
            if (svg) svg.style.display = "";
            if (hint) hint.style.display = "";
        });
    }
}

function getInsurances() {
    $.ajax({
        url: BASE_URL+'/insurances',
        method: 'GET',
        success: function (data) {
            const insuranceSelect = $('#insurance');
            insuranceSelect.empty();
            insuranceSelect.append('<option value="">Seleccione una aseguradora</option>');
            data.forEach(function (insurance) {
                insuranceSelect.append('<option value="' + insurance.id_insurance + '">' + insurance.name + '</option>');
            });
        },
        error: function (error) {
            console.error('Error fetching insurances:', error);
        }
    });
}
