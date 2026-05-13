console.log("booking.js aktif");

// =====================
// STEP FUNCTION
// =====================
function nextStep(step) {

    // VALIDASI STEP 1
    if (step === 2) {

        let nik =
            document.querySelector('input[name="nik"]').value;

        let nama =
            document.querySelector('input[name="nama"]').value;

        let tanggalLahir =
            document.querySelector('input[name="tanggal_lahir"]').value;

        let gender =
            document.querySelector('select[name="gender"]').value;

        let noHp =
            document.querySelector('input[name="no_hp"]').value;

        let alamat =
            document.querySelector('textarea[name="alamat"]').value;

        if (
            !nik ||
            !nama ||
            !tanggalLahir ||
            !gender ||
            !noHp ||
            !alamat
        ) {

            alert('Lengkapi identitas terlebih dahulu!');

            return;
        }
    }

    document.querySelectorAll('.step-section')
        .forEach(section => {

            section.classList.remove('active');

        });

    document.getElementById('step-' + step)
        .classList.add('active');

}


// =====================
// DOM READY
// =====================
document.addEventListener('DOMContentLoaded', function () {

    let doctorSelect =
        document.getElementById('doctor');

    let tanggalInput =
        document.getElementById('tanggal');

    let scheduleList =
        document.getElementById('schedule-list');


    // =====================
    // DISABLED AWAL
    // =====================

    doctorSelect.disabled = true;
    tanggalInput.disabled = true;


    // =====================
    // FLATPICKR
    // =====================

    if (document.getElementById('tanggal')) {

        flatpickr("#tanggal", {

            dateFormat: "Y-m-d",

            minDate: "today",

            maxDate: new Date().fp_incr(28)

        });

    }

    if (document.getElementById('tanggal_lahir')) {

        flatpickr("#tanggal_lahir", {

            dateFormat: "d-m-Y",

            maxDate: "today"

        });

    }


    // =====================
    // POLI → DOCTOR
    // =====================

    document.getElementById('poli')
        .addEventListener('change', function () {

            let poliId = this.value;

            // RESET
            doctorSelect.innerHTML =
                '<option value="">Pilih Dokter</option>';

            doctorSelect.disabled = true;

            scheduleList.innerHTML =
                'Pilih dokter terlebih dahulu';

            tanggalInput.value = '';

            tanggalInput.disabled = true;

            fetch('/get-doctors/' + poliId)

                .then(res => res.json())

                .then(data => {

                    data.forEach(doctor => {

                        doctorSelect.innerHTML += `

                            <option value="${doctor.id}">
                                ${doctor.nama}
                            </option>

                        `;

                    });

                    doctorSelect.disabled = false;

                });

        });


    // =====================
    // DOCTOR → SCHEDULE
    // =====================

    document.addEventListener('change', function (e) {

        if (e.target.id === 'doctor') {

            let doctorId = e.target.value;

            tanggalInput.value = '';

            tanggalInput.disabled = true;

            fetch('/get-schedules/' + doctorId)

                .then(res => res.json())

                .then(data => {

                    console.log(data);

                    scheduleList.innerHTML = '';

                    if (data.length === 0) {

                        scheduleList.innerHTML =
                            'Tidak ada jadwal';

                        return;

                    }

                    data.forEach(schedule => {

                        scheduleList.innerHTML += `

                            <button
                                type="button"
                                class="btn btn-outline-primary mb-2 w-100 schedule-btn"
                                data-day="${schedule.day}"
                            >

                                ${schedule.day}

                                :

                                ${schedule.time_start}

                                -

                                ${schedule.time_finish}

                            </button>

                        `;

                    });

                });

        }

    });

    // =====================
// CLICK JADWAL
// =====================

document.addEventListener('click', function (e) {

    if (e.target.classList.contains('schedule-btn')) {

        // RESET SEMUA BUTTON
        document.querySelectorAll('.schedule-btn')
            .forEach(btn => {

                btn.classList.remove(
                    'btn-primary',
                    'text-white'
                );

                btn.classList.add(
                    'btn-outline-primary'
                );

            });

        // BUTTON AKTIF
        e.target.classList.remove(
            'btn-outline-primary'
        );

        e.target.classList.add(
            'btn-primary',
            'text-white'
        );

        let selectedDay =
            e.target.dataset.day;

        // RESET INPUT TANGGAL
        tanggalInput.value = '';

        // DISABLED DULU
        tanggalInput.disabled = true;

        // FILTER TANGGAL
        enableDateByDay(selectedDay);

        // ENABLE SETELAH FILTER
        tanggalInput.disabled = false;

    }

});
    
    // =====================
    // FILTER HARI TANGGAL
    // =====================

    function enableDateByDay(dayName) {

        const dayMap = {

            'Minggu': 0,
            'Senin': 1,
            'Selasa': 2,
            'Rabu': 3,
            'Kamis': 4,
            'Jumat': 5,
            'Sabtu': 6

        };

        let targetDay = dayMap[dayName];

        flatpickr("#tanggal", {

            dateFormat: "d-m-Y",

            minDate: new Date().fp_incr(1),

            maxDate: new Date().fp_incr(28),

            enable: [

                function(date) {

                    return date.getDay() === targetDay;

                }

            ]

        });

    }

});