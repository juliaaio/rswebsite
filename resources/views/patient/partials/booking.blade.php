<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div id="step-2" class="step-section">

                        <h4 class="step-title mb-4">
                            Step 2 - Booking Pemeriksaan
                        </h4>

                        <div class="mb-3">
                            <label class="form-label">
                                Poli
                            </label>
                            <div class="input-group">
                             <span class="input-group-text">
                               <i class="bi bi-file-earmark-medical"></i>
                             </span>

                            <select
                                name="poli"
                                id="poli"
                                class="form-select"
                            >

                            <option value="">
                                Pilih Poli
                            </option>

                            @foreach($polis as $poli)

                            <option value="{{ $poli->id }}">
                                {{ $poli->nama }}
                            </option>

                            @endforeach

                            </select>
                            </div>
                        </div>
<div class="mb-3">

    <label class="form-label">
        Dokter
    </label>

    <div class="input-group">

        <span class="input-group-text">
            <i class="bi bi-person-check"></i>
        </span>

        <select
            name="doctor"
            id="doctor"
            class="form-select"
            disabled
        >

            <option value="">
                Pilih Dokter
            </option>

        </select>

    </div>

</div>

                       <div class="mb-3">

    <label class="form-label">
        Jadwal Tersedia

        <input
            type="hidden"
            id="available-days"
        >
    </label>

    <div
        id="schedule-list"
        class="schedule-list"
    >

        <i class="bi bi-clock me-2"></i>

        Pilih Jadwal Pemeriksaan

    </div>

</div>

                        <div class="mb-2">
                            <label class="form-label">
                                Tanggal Pemeriksaan
                            </label>
                            <div class="input-group">
                             <span class="input-group-text">
                                <i class="bi bi-calendar"></i>
                             </span>

                                <input
                                        type="text"
                                        name="tanggal"
                                        id="tanggal"
                                        class="form-control"
                                        placeholder="Pilih tanggal"
                                        disabled
                                >
                            </div>
                        </div>

                       <div class="mb-2">
    <label class="form-label">
        Keluhan
    </label>

    <div class="input-group">
        <span class="input-group-text">
            <i class="bi bi-exclamation-triangle"></i>
        </span>

        <textarea
            name="keluhan"
            rows="3"
            class="form-control"
            placeholder="Tuliskan Keluhan Anda..."
        ></textarea>
    </div>
</div>

<div class="mb-2">
    <label class="form-label">
        Alergi (Opsional)
    </label>

    <div class="input-group">
        <span class="input-group-text">
            <i class="bi bi-exclamation-triangle"></i>
        </span>

        <textarea
            name="alergi"
            rows="3"
            class="form-control"
            placeholder="Sebutkan Riwayat Alergi Makanan atau Obat"
        ></textarea>
    </div>
</div>

<div class="d-flex justify-content-between mt-4">
    <button
        type="button"
        class="btn btn-secondary"
        onclick="nextStep(1)"
    >
        Kembali
    </button>

    <button
        type="submit"
        class="btn btn-primary px-4"
    >
        Booking Sekarang
    </button>
</div>