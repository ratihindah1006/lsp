@extends('layout.assessor')

@section('container')

<form method="POST" action="/assessor/ak01/edit/{{ $assessi->id }}">
  @method('put')
  @csrf
  <input type="hidden" id="assessiId" name="assessiId" value="{{ $assessi->id }}">
  <div class="container-fluid">
    <div class="row">
      <div class=col-lg-1></div>
        <div class="col-lg-10">
          <div class="card text-dark">
            <div class="card-header">
              <h5 class="card-title bold">FR-AK-01 FORMULIR PERSETUJUAN ASESMEN DAN KERAHASIAAN</h5>
            </div>
            <div class="card-body">
                <table style="min-width: 100%" border="3">
                  <tr>
                    <td colspan="3">Persetujuan Assessmen ini untuk menjamin bahwa Peserta telah diberikan secara rinci tentang perencanaan dan proses asesmen</td>
                  </tr>
                  <tr>
                    <td rowspan="2"> Skema Sertifikasi</td>
                    <td>Judul</td>
                    <td> : {{ $schema->schema_title }}</td>
                  </tr>
                  <tr>
                    <td>Nomor</td>
                    <td> : {{ $schema->no_skkni }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">TUK</td>
                    <td>
                      <div class="form-group p-0 m-0" >
                        <label class="radio-inline">
                            <input type="radio" name="tuk" value="Sewaktu" required
                            @if (isset($ak01['tuk']))
                              @if ($ak01['tuk'] == "Sewaktu")
                                {{ 'checked' }}
                              @endif
                            @endif> Sewaktu/</label>
                        <label class="radio-inline">
                            <input type="radio" name="tuk" value="Tempat Kerja" required
                            @if (isset($ak01['tuk']))
                              @if ($ak01['tuk'] == "Tempat Kerja")
                                {{ 'checked' }}
                              @endif
                            @endif> Tempat Kerja</label>
                        <label class="radio-inline">
                            <input type="radio" name="tuk" value="Mandiri" required
                            @if (isset($ak01['tuk']))
                              @if ($ak01['tuk'] == "Mandiri")
                                {{ 'checked' }}
                              @endif
                            @endif> /Mandiri</label>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">Nama Assessor</td>
                    <td> : {{ $assessor }}</td>
                  </tr>
                  <tr>
                    <td colspan="2">Nama Peserta</td>
                    <td> : {{ $assessi->data_assessi->name }}</td>
                  </tr>
                  <tr>
                    <td rowspan="5" colspan="2">Bukti yang dikumpulkan</td>
                        <td>
                          <div class="form-group m-0">
                            <div class="form-check">
                              <input type="checkbox" name="tl_verif_porto" class="tl_verif_porto" id="tl_verif_porto"
                              @if (isset($ak01['tl_verif_porto']))
                                @if($ak01['tl_verif_porto'])
                                  {{ 'checked' }}          
                                @endif        
                              @endif>
                              <label class="tl_verif_porto" for="tl_verif_porto">TL: Verifikasi Portofolio</label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group m-0">
                            <div class="form-check">
                              <input type="checkbox" name="l_obs_langsung" class="l_obs_langsung" id="l_obs_langsung"  
                              @if (isset($ak01['l_obs_langsung']))
                                @if($ak01['l_obs_langsung'])
                                  {{ 'checked' }}          
                                @endif                 
                              @endif>
                              <label class="l_obs_langsung" for="l_obs_langsung">L: Observasi Langsung  </label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group m-0">
                            <div class="form-check">
                              <input type="checkbox" name="t_p_tulis" class="t_p_tulis" id="t_p_tulis" 
                              @if (isset($ak01['t_p_tulis']))
                                @if($ak01['t_p_tulis'])
                                  {{ 'checked' }}          
                                @endif                  
                              @endif>
                              <label class="t_p_tulis" for="t_p_tulis">T: Daftar Pertanyaan Tulis</label>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group m-0">
                            <div class="form-check">
                              <input type="checkbox" name="t_p_lisan" class="t_p_lisan" id="t_p_lisan"
                              @if (isset($ak01['t_p_lisan']))
                                @if($ak01['t_p_lisan'])
                                  {{ 'checked' }}          
                                @endif      
                              @endif>
                              <label class="t_p_lisan" for="t_p_lisan">T: Daftar Pertanyaan Lisan</label>
                          </div>
                        </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group m-0">
                            <div class="form-check">
                              <input type="checkbox" name="t_p_wawancara" class="t_p_wawancara" id="t_p_wawancara" 
                              @if (isset($ak01['t_p_wawancara']))
                                @if($ak01['t_p_wawancara'])
                                  {{ 'checked' }}          
                                @endif             
                              @endif>
                              <label class="t_p_wawancara" for="t_p_wawancara">T: Daftar Pertanyaan Wawancara</label>
                          </div>
                        </div>
                        </td>
                      </tr>
                    <tr>
                      <td rowspan="2">
                        Pelaksanaan Assessmen yang disepakati
                      </td>
                      <td>Hari/Tanggal</td>
                      <td> : {{ $event_start }}</td>
                    </tr>
                    <tr>
                      <td>TUK</td>
                      <td> : {{ $assessi->schema_class->tuk }}</td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <b>Assesi</b><br>
                        Bahwa saya sudah Mendapatkan Penjelasan Hak dan Prosedur Banding Oleh Asesor
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <b>Assesor</b><br>
                        Menyatakan tidak akan membuka hasil pekerjaan yang saya peroleh karena penugasan saya sebagai asesor dalam pekerjaan Asesmen kepada siapapun atau organisasi apapun selain kepada pihak yang berwenang sehubungan dengan kewajiban saya sebagai Asesor yang ditugaskan oleh LSP.
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <b>Assesi</b><br>
                        Saya setuju mengikuti asesmen dengan pemahaman bahwa informasi yang dikumpulkan hanya digunakan untuk pengembangan profesional dan hanya dapat diakses oleh orang tertentu saja
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        Tanda Tangan Peserta <br>
                        <img class="txt" src="{{ asset('storage/' . $assessi->apl01->assessi_signature) }}"
                        height="100px">
                        <br>
                        Tgl {{ $event_start }}
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        Tanda Tangan Assesor <br>
                        <img class="txt" src="{{ asset('storage/' . $assessi->apl01->assessor_signature) }}"
                        height="100px">
                        <br>
                        Tgl {{ $event_start }}
                      </td>
                    </tr>
                </table>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-lg float-right">Save</button>
              </div>
              </div>          
          </div>
        </div>
      </div>
    </form>
@endsection