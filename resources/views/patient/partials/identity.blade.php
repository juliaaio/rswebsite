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
                                NIK
                            </label>

                            <input
                                type="text"
                                name="nik"
                                class="form-control {{ $patient ? 'readonly-box' : '' }}"
                                value="{{ $patient->nik ?? auth()->user()->nik }}"
                                {{ $patient ? 'readonly' : '' }}
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                name="nama"
                                class="form-control {{ $patient ? 'readonly-box' : '' }}"
                                value="{{ $patient->nama ?? auth()->user()->name }}"
                                {{ $patient ? 'readonly' : '' }}
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Tanggal Lahir
                            </label>

                            <input
                                 type="text"
                                id="tanggal_lahir"
                                name="tanggal_lahir"
                                class="form-control {{ $patient ? 'readonly-box' : '' }}"
                                value="{{ $patient->tanggal_lahir ?? '' }}"
                                {{ $patient ? 'readonly' : '' }}
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Jenis Kelamin
                            </label>

                            <select
                                name="gender"
                                class="form-select {{ $patient ? 'readonly-box' : '' }}"
                                {{ $patient ? 'disabled' : '' }}
                            >
                                <option value="">
                                    -- pilih gender --
                                </option>

                                <option
                                    value="Laki-laki"
                                    {{ ($patient && $patient->gender == 'Laki-laki') ? 'selected' : '' }}
                                >
                                    Laki-laki
                                </option>

                                <option
                                    value="Perempuan"
                                    {{ ($patient && $patient->gender == 'Perempuan') ? 'selected' : '' }}
                                >
                                    Perempuan
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Nomor Hp
                            </label>

                            <input
                                type="text"
                                name="no_hp"
                                class="form-control {{ $patient ? 'readonly-box' : '' }}"
                                value="{{ $patient->no_hp ?? '' }}"
                                {{ $patient ? 'readonly' : '' }}
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                Alamat
                            </label>

                            <textarea
                                name="alamat"
                                rows="3"
                                class="form-control {{ $patient ? 'readonly-box' : '' }}"
                                {{ $patient ? 'readonly' : '' }}
                            >{{ $patient->alamat ?? '' }}</textarea>
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