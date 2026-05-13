 <div id="step-2" class="step-section">

                        <h4 class="step-title mb-4">
                            Step 2 - Booking Pemeriksaan
                        </h4>

                        <div class="mb-3">
                            <label class="form-label">
                                Poli
                            </label>

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

                        <div class="mb-3">
                            <label class="form-label">
                                Dokter
                            </label>

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
                                class="border rounded p-3 bg-light"
                            >

                                Pilih dokter terlebih dahulu

                            </div>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Tanggal Pemeriksaan
                            </label>

                                <input
                                        type="text"
                                        name="tanggal"
                                        id="tanggal"
                                        class="form-control"
                                        placeholder="Pilih tanggal"
                                        disabled
                                >
                            
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Keluhan
                            </label>

                            <textarea
                                name="keluhan"
                                rows="3"
                                class="form-control"
                                placeholder="Tuliskan keluhan Anda..."
                            ></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                Alergi
                            </label>

                            <textarea
                                name="alergi"
                                rows="3"
                                class="form-control"
                                placeholder="Tuliskan alergi jika ada..."
                            ></textarea>
                        </div>

                        <div class="d-flex justify-content-between">

                            <button
                                type="button"
                                class="btn btn-secondary"
                                onclick="nextStep(1)"
                            >
                                Kembali
                            </button>

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Booking Sekarang
                            </button>

                        </div>

                    </div>