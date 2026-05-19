 <link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

{{-- ========================= --}}
                    {{-- STEP 1 IDENTITAS --}}
                    {{-- ========================= --}}

                    <div id="step-1" class="step-section active">

                        <h4 class="step-title mb-4">
                            Step 1 - Identitas Pasien
                        </h4>

                        <div class="mb-3">
                            <label class="form-label">
                                Nomor Rekam Medis
                            </label>

                            <input
                                type="text"
                                class="form-control readonly-box"
                                value="{{ $patient->no_rm ?? 'Belum tersedia' }}"
                                readonly
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                NIK (Nomor Induk Kependudukan)
                            </label>

                            <div class="input-group">
                             <span class="input-group-text">
                                <i class="bi bi-card-text"></i>
                             </span>

                            <input
                                type="text"
                                name="nik"
                                placeholder="Masukkan NIK Anda"
                                class="form-control {{ $patient ? 'readonly-box' : '' }}"
                                value="{{ $patient->nik ?? auth()->user()->nik }}"
                                {{ $patient ? 'readonly' : '' }}
                            >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Nama Lengkap
                            </label>
                            
                            <div class="input-group">
                             <span class="input-group-text">
                                <i class="bi bi-person"></i>
                             </span>

                            <input
                                type="text"
                                name="nama"
                                placeholder="Masukkan Nama Lengkap"
                                class="form-control {{ $patient ? 'readonly-box' : '' }}"
                                value="{{ $patient->nama ?? auth()->user()->name }}"
                                {{ $patient ? 'readonly' : '' }}
                            >
                             </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Tanggal Lahir
                            </label>

                            <div class="input-group">
                             <span class="input-group-text">
                                <i class="bi bi-person"></i>
                             </span>
                             
                            <input
                                 type="text"
                                id="tanggal_lahir"
                                name="tanggal_lahir"
                                placeholder="mm/dd/yyyy"
                                class="form-control {{ $patient ? 'readonly-box' : '' }}"
                                value="{{ $patient->tanggal_lahir ?? '' }}"
                                {{ $patient ? 'readonly' : '' }}
                            >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Jenis Kelamin
                            </label>

                            <select name="gender" class="form-select">
                                <option value="">
                                    -- Pilih Gender --
                                </option>
                                <option value="L"
                                    {{ $patient->gender == 'L' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>
                                <option value="P"
                                    {{ $patient->gender == 'P' ? 'selected' : '' }}>
                                    Perempuan
                                </option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Nomor Telepon
                            </label>

                            <div class="input-group">
                             <span class="input-group-text">
                                <i class="bi bi-telephone"></i>
                             </span>

                            <input
                                type="text"
                                name="no_hp"
                                placeholder="+62 8..."
                                class="form-control {{ $patient ? 'readonly-box' : '' }}"
                                value="{{ $patient->no_hp ?? '' }}"
                                {{ $patient ? 'readonly' : '' }}
                            >
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                Alamat
                            </label>

                            <div class="input-group">
                             <span class="input-group-text">
                                <i class="bi bi-person"></i>
                             </span>
                             
                            <textarea
                                name="alamat"
                                rows="3"
                                placeholder="Masukkan Alamat Lengkap Anda"
                                class="form-control {{ $patient ? 'readonly-box' : '' }}"
                                {{ $patient ? 'readonly' : '' }}
                            >{{ $patient->alamat ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="text-end">
                            <button
                                type="button"
                                class="btn btn-primary"
                                onclick="nextStep(2)"
                            >
                                Selanjutnya
                            </button>
                        </div>

                    </div>