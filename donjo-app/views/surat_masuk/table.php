<script>
	$('document').ready(function()
	{
		$('select[name=pamong_ttd]').change(function(e)
		{
			$('select[name=jabatan_ttd]').val($(this).find(':selected').data('jabatan'));
		});
		$('select[name=pamong_ketahui]').change(function(e)
		{
			$('select[name=jabatan_ketahui]').val($(this).find(':selected').data('jabatan'));
		});
	});
</script>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Surat Masuk</h1>
		<ol class="breadcrumb">
			<li><a href="<?=site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Surat Masuk</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="<?= site_url('laporan')?>" method="post" class="form-horizontal">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
            <div class="box-header with-border">
							<a href="<?= site_url('surat_masuk/form')?>" title="Tambah Surat Masuk Baru" class="btn btn-social btn-flat bg-olive btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-plus"></i> Tambah Surat Masuk Baru</a>
							<a href="#confirm-delete" title="Hapus Data" title="Hapus Data Terpilih" onclick="deleteAllBox('mainform','<?= site_url("surat_masuk/delete_all/$p/$o")?>')" class="btn btn-social btn-flat	btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class='fa fa-trash-o'></i> Hapus Data Terpilih</a>
							<a href="#" title="Cetak Laporan" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Cetak Surat" onclick="$('#'+'mainform').attr('target','_blank');formAction('mainform','<?= site_url('surat_masuk/cetak')?>')"><i class="fa fa-print "></i> Cetak</a>
							<a href="#" title="Unduh Laporan" class="btn btn-social btn-flat bg-navy btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Unduh Laporan" onclick="$('#'+'mainform').attr('target','_blank');formAction('mainform','<?= site_url('surat_masuk/excel')?>')"><i class="fa fa-download"></i> Unduh</a>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-md-2 control-label" for="diketahui">Tahun Penerimaaan</label>
										<div class="col-md-2">
											<select name="filter" class="form-control input-sm" onchange="formAction('mainform','<?= site_url('surat_masuk/filter')?>')">
												<option value="">Semua</option>
												<?php foreach ($tahun_penerimaan as $tahun): ?>
													<option value="<?= $tahun['tahun']?>" <?php selected($filter, $tahun['tahun']) ?>><?= $tahun['tahun']?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
                  <div class="form-group">
										<label class="col-md-2 control-label" for="pamong_ttd">Laporan Ditandatangani</label>
                    <div class="col-md-3">
                      <select class="form-control input-sm" name="pamong_ttd" width="100%">
												<option value="">Pilih Staf Pemerintah <?= ucwords($this->setting->sebutan_desa)?></option>
												<?php foreach ($pamong AS $data): ?>
													<option value="<?=  $data['pamong_nama']?>" data-jabatan="<?= trim($data['jabatan'])?>"><?= $data['pamong_nama']?><?= $data['pamong_nama']?>(<?= $data['jabatan']?>)</option>
												<?php endforeach; ?>
                      </select>
                    </div>
										<label class="col-md-1 control-label" for="jabatan_ttd">Sebagai</label>
                    <div class="col-md-3">
                      <select class="form-control input-sm" name="jabatan_ttd" width="100%">
												<option value="">Pilih Jabatan</option>
												<?php foreach ($pamong AS $data): ?>
													<option><?= $data['jabatan']?></option>
												<?php endforeach; ?>
                      </select>
                    </div>
                  </div>
									<div class="form-group">
										<label class="col-md-2 control-label" for="pamong_ketahui">Laporan Diketahui</label>
                    <div class="col-md-3">
                      <select class="form-control input-sm" name="pamong_ketahui" width="100%">
												<option value="">Pilih Staf Pemerintah <?= ucwords($this->setting->sebutan_desa)?></option>
												<?php foreach ($pamong AS $data): ?>
													<option value="<?=  $data['pamong_nama']?>" data-jabatan="<?= trim($data['jabatan'])?>"><?= $data['pamong_nama']?><?= $data['pamong_nama']?>(<?= $data['jabatan']?>)</option>
												<?php endforeach; ?>
                      </select>
                    </div>
										<label class="col-md-1 control-label" for="jabatan_ketahui">Sebagai</label>
                    <div class="col-md-3">
                      <select class="form-control input-sm" name="jabatan_ketahui" width="100%">
												<option value="">Pilih Jabatan</option>
												<?php foreach ($pamong AS $data): ?>
													<option><?= $data['jabatan']?></option>
												<?php endforeach; ?>
                      </select>
                    </div>
                  </div>
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-12">
													<div class="box-tools">
														<div class="input-group input-group-sm pull-right">
															<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=$cari?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?=site_url("surat_masuk/search")?>');$('#'+'mainform').submit();}">
															<div class="input-group-btn">
																<button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action', '<?=site_url("surat_masuk/search")?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-bordered dataTable table-hover">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th><input type="checkbox" id="checkall"/></th>
																	<?php if ($o==2): ?>
																		<th><a href="<?= site_url("surat_masuk/index/$p/1")?>">No. Urut <i class='fa fa-sort-asc fa-sm'></i></a></th>
																	<?php elseif ($o==1): ?>
																		<th><a href="<?= site_url("surat_masuk/index/$p/2")?>">No. Urut <i class='fa fa-sort-desc fa-sm'></i></a></th>
																	<?php else: ?>
																		<th><a href="<?= site_url("surat_masuk/index/$p/1")?>">No. Urut <i class='fa fa-sort fa-sm'></i></a></th>
																	<?php endif; ?>
																	<th>Aksi</th>
																	<?php if ($o==4): ?>
																		<th><a href="<?= site_url("surat_masuk/index/$p/3")?>">Tanggal Penerimaan <i class='fa fa-sort-asc fa-sm'></i></a></th>
																	<?php elseif ($o==3): ?>
																		<th><a href="<?= site_url("surat_masuk/index/$p/4")?>">Tanggal Penerimaan <i class='fa fa-sort-desc fa-sm'></i></a></th>
																	<?php else: ?>
																		<th><a href="<?= site_url("surat_masuk/index/$p/3")?>">Tanggal Penerimaan <i class='fa fa-sort fa-sm'></i></a></th>
																	<?php endif; ?>
																	<th>Nomor Surat</th>
																	<th>Tanggal Surat</th>
																	<?php if ($o==6): ?>
																		<th nowrap><a href="<?= site_url("surat_masuk/index/$p/5")?>">Pengirim <i class='fa fa-sort-asc fa-sm'></i></a></th>
																	<?php elseif ($o==5): ?>
																		<th nowrap><a href="<?= site_url("surat_masuk/index/$p/6")?>">Pengirim <i class='fa fa-sort-desc fa-sm'></i></a></th>
																	<?php else: ?>
																		<th nowrap><a href="<?= site_url("surat_masuk/index/$p/5")?>">Pengirim <i class='fa fa-sort fa-sm'></i></a></th>
																	<?php endif; ?>
																	<th width="30%">Isi Singkat</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($main as $data): ?>
																	<tr>
																		<td><input type="checkbox" name="id_cb[]" value="<?= $data['id']?>" /></td>
																		<td><?= $data['nomor_urut']?></td>
																		<td>
																			<a href="<?= site_url("surat_masuk/form/$p/$o/$data[id]")?>" class="btn bg-orange btn-flat btn-sm"  title="Ubah Data"><i class="fa fa-edit"></i></a>
																			<?php if ($data['berkas_scan']): ?>
																				<a href="<?= base_url(LOKASI_ARSIP.$data['berkas_scan'])?>" class="btn bg-purple btn-flat btn-sm"  title="Unduh Berkas Surat" target="_blank"><i class="fa fa-download"></i></a>
																			<?php endif; ?>
																			<a href="<?= site_url('surat_masuk/disposisi/'.$data['id'])?>" class="btn bg-navy btn-flat btn-sm"  title="Lembar Disposisi Surat" target="_blank"><i class="fa fa-file-archive-o"></i></a>
																			<a href="#" data-href="<?= site_url("surat_masuk/delete/$p/$o/$data[id]")?>" class="btn bg-maroon btn-flat btn-sm"  title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
																		</td>
																		<td nowrap><?= tgl_indo_out($data['tanggal_penerimaan'])?></td>
																		<td nowrap><?= $data['nomor_surat']?></td>
																		<td nowrap><?= tgl_indo_out($data['tanggal_surat'])?></td>
																		<td nowrap><?= $data['pengirim']?></td>
																		<td><?= $data['isi_singkat']?></td>
																	</tr>
																<?php endforeach; ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</form>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="dataTables_length">
                          <form id="paging" action="<?= site_url("surat_masuk")?>" method="post" class="form-horizontal">
                            <label>
                              Tampilkan
                              <select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">
                                <option value="20" <?php selected($per_page, 20); ?> >20</option>
                                <option value="50" <?php selected($per_page, 50); ?> >50</option>
                                <option value="100" <?php selected($per_page, 100); ?> >100</option>
                              </select>
                              Dari
                              <strong><?= $paging->num_rows?></strong>
                              Total Data
                            </label>
                          </form>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="dataTables_paginate paging_simple_numbers">
                          <ul class="pagination">
                            <?php if ($paging->start_link): ?>
                              <li><a href="<?=site_url("surat_masuk/index/$paging->start_link/$o")?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
                            <?php endif; ?>
                            <?php if ($paging->prev): ?>
                              <li><a href="<?=site_url("surat_masuk/index/$paging->prev/$o")?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                            <?php endif; ?>
                            <?php for ($i=$paging->start_link;$i<=$paging->end_link;$i++): ?>
                              <li <?=jecho($p, $i, "class='active'")?>><a href="<?= site_url("surat_masuk/index/$i/$o")?>"><?= $i?></a></li>
                            <?php endfor; ?>
                            <?php if ($paging->next): ?>
                              <li><a href="<?=site_url("surat_masuk/index/$paging->next/$o")?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                            <?php endif; ?>
                            <?php if ($paging->end_link): ?>
                              <li><a href="<?=site_url("surat_masuk/index/$paging->end_link/$o")?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
                            <?php endif; ?>
                          </ul>
                        </div>
                      </div>
                    </div>
									</div>
								</form>
							</div>
							<div class='modal fade' id='confirm-delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
											<h4 class='modal-title' id='myModalLabel'><i class='fa fa-exclamation-triangle text-red'></i> Konfirmasi</h4>
										</div>
										<div class='modal-body btn-info'>
											Apakah Anda yakin ingin menghapus data ini?
										</div>
										<div class='modal-footer'>
											<button type="button" class="btn btn-social btn-flat btn-warning btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
											<a class='btn-ok'>
												<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" id="ok-delete"><i class='fa fa-trash-o'></i> Hapus</button>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>

