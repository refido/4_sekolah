	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Data Sekolah</h1>
		<ol class="breadcrumb">
			<li class="active">Pelajaran Siswa</li>
		</ol>
	</section>

	<!-- Main content -->

	<section class="content">
		<div class="box box-primary" id="box-tampil">
			<!-- tabel header -->
			<div class="box-header">
				<h3 class="box-title">Jam Dinas</h3>
				<br>
				<br>
				<?php 
				$a = mysqli_query($con,"SELECT * from user");
				while ($b = mysqli_fetch_array($a)) {
					?>
					<div>
						<span>
							Nama lengkap : <?php echo $b['nama lengkap'] ?>
						</span>
					</div>
					<div>
						<span>
							Alamat : <?php echo $b['alamat'] ?>
						</span>
					</div>
					<div>
						<span>
							Nomor Telepon : <?php echo $b['nomer telepon'] ?>
						</span>
					</div>
					<div>
						<span>
							Komkal/Mapel : <?php echo $b['komkal/mapel'] ?>
						</span>
					</div>
					<div>
						<span>
							Semester : <?php echo $b['semester'] ?>
						</span>
					</div>
					<div>
						<span>
							Tahun Pelajaran : <?php echo $b['tahun pelajaran'] ?>
						</span>
					</div>
					<?php
				}
				?>

			</div>
			<!-- tabel body -->
			<div class="box-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover data">
						<thead>
							<tr>
								<th><center>Jam</center></th>
								<th><center>Senin</center></th>
								<th><center>Selasa</center></th>
								<th><center>Rabu</center></th>
								<th><center>Kamis</center></th>
								<th><center>Jum'at</center></th>
								<th><center>Sabtu</center></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							?>
							<tr>
								<td><center><?php echo $no++; ?></center></td>
								<td>
									<center>
										<select name="kelas" class="select2" onchange="this.form.submit()">
											<option>NTM</option>
											<?php 
											$y = mysqli_query($con,"SELECT * from kelas");
											while ($u = mysqli_fetch_array($y)) {
												?>
												<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
												<?php 
											}
											?>
											
										</select>
									</center>
									<td>
										<center>
											<select class="select2">
												<option>NTM</option>
												<?php 
												$y = mysqli_query($con,"SELECT * from kelas");
												while ($u = mysqli_fetch_array($y)) {
													?>
													<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
													<?php 
												}
												?>
											</select>
										</center>
									</td>
									<td>
										<center>
											<select class="select2">
												<option>NTM</option>
												<?php 
												$y = mysqli_query($con,"SELECT * from kelas");
												while ($u = mysqli_fetch_array($y)) {
													?>
													<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
													<?php 
												}
												?>
											</select>
										</center>
									</td>
									<td>
										<center>
											<select class="select2">
												<option>NTM</option>
												<?php 
												$y = mysqli_query($con,"SELECT * from kelas");
												while ($u = mysqli_fetch_array($y)) {
													?>
													<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
													<?php 
												}
												?>
											</select>
										</center>
									</td>
									<td>
										<center>
											<select class="select2">
												<option>NTM</option>
												<?php 
												$y = mysqli_query($con,"SELECT * from kelas");
												while ($u = mysqli_fetch_array($y)) {
													?>
													<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
													<?php 
												}
												?>
											</select>
										</center>
									</td>
									<td rowspan="12">
										<center>
											<span>EXTRAKULIKULER</span>
										</center>
									</td>
								</td>
							</tr>
							<tr>
								<td><center><?php echo $no++; ?></center></td>
								<td>
									<center>
										<select class="select2">
											<option>NTM</option>
											<?php 
											$y = mysqli_query($con,"SELECT * from kelas");
											while ($u = mysqli_fetch_array($y)) {
												?>
												<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
												<?php 
											}
											?>
										</select>
									</center>
									<td>
										<center>
											<select class="select2">
												<option>NTM</option>
												<?php 
												$y = mysqli_query($con,"SELECT * from kelas");
												while ($u = mysqli_fetch_array($y)) {
													?>
													<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
													<?php 
												}
												?>
											</select>
										</center>
									</td>
									<td>
										<center>
											<select class="select2">
												<option>NTM</option>
												<?php 
												$y = mysqli_query($con,"SELECT * from kelas");
												while ($u = mysqli_fetch_array($y)) {
													?>
													<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
													<?php 
												}
												?>
											</select>
										</center>
									</td>
									<td>
										<center>
											<select class="select2">
												<option>NTM</option>
												<?php 
												$y = mysqli_query($con,"SELECT * from kelas");
												while ($u = mysqli_fetch_array($y)) {
													?>
													<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
													<?php 
												}
												?>
											</select>
										</center>
									</td>
									<td>
										<center>
											<select class="select2">
												<option>NTM</option>
												<?php 
												$y = mysqli_query($con,"SELECT * from kelas");
												while ($u = mysqli_fetch_array($y)) {
													?>
													<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
													<?php 
												}
												?>
											</select>
										</center>
									</td>
								</tr>
								<tr>
									<td><center><?php echo $no++; ?></center></td>
									<td>
										<center>
											<select class="select2">
												<option>NTM</option>
												<?php 
												$y = mysqli_query($con,"SELECT * from kelas");
												while ($u = mysqli_fetch_array($y)) {
													?>
													<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
													<?php 
												}
												?>
											</select>
										</center>
										<td>
											<center>
												<select class="select2">
													<option>NTM</option>
													<?php 
													$y = mysqli_query($con,"SELECT * from kelas");
													while ($u = mysqli_fetch_array($y)) {
														?>
														<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
														<?php 
													}
													?>
												</select>
											</center>
										</td>
										<td>
											<center>
												<select class="select2">
													<option>NTM</option>
													<?php 
													$y = mysqli_query($con,"SELECT * from kelas");
													while ($u = mysqli_fetch_array($y)) {
														?>
														<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
														<?php 
													}
													?>
												</select>
											</center>
										</td>
										<td>
											<center>
												<select class="select2">
													<option>NTM</option>
													<?php 
													$y = mysqli_query($con,"SELECT * from kelas");
													while ($u = mysqli_fetch_array($y)) {
														?>
														<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
														<?php 
													}
													?>
												</select>
											</center>
										</td>
										<td>
											<center>
												<select class="select2">
													<option>NTM</option>
													<?php 
													$y = mysqli_query($con,"SELECT * from kelas");
													while ($u = mysqli_fetch_array($y)) {
														?>
														<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
														<?php 
													}
													?>
												</select>
											</center>
										</td>
									</tr>
									<tr>
										<td><center><?php echo $no++; ?></center></td>
										<td>
											<center>
												<select class="select2">
													<option>NTM</option>
													<?php 
													$y = mysqli_query($con,"SELECT * from kelas");
													while ($u = mysqli_fetch_array($y)) {
														?>
														<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
														<?php 
													}
													?>
												</select>
											</center>
											<td>
												<center>
													<select class="select2">
														<option>NTM</option>
														<?php 
														$y = mysqli_query($con,"SELECT * from kelas");
														while ($u = mysqli_fetch_array($y)) {
															?>
															<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
															<?php 
														}
														?>
													</select>
												</center>
											</td>
											<td>
												<center>
													<select class="select2">
														<option>NTM</option>
														<?php 
														$y = mysqli_query($con,"SELECT * from kelas");
														while ($u = mysqli_fetch_array($y)) {
															?>
															<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
															<?php 
														}
														?>
													</select>
												</center>
											</td>
											<td>
												<center>
													<select class="select2">
														<option>NTM</option>
														<?php 
														$y = mysqli_query($con,"SELECT * from kelas");
														while ($u = mysqli_fetch_array($y)) {
															?>
															<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
															<?php 
														}
														?>
													</select>
												</center>
											</td>
											<td>
												<center>
													<select class="select2">
														<option>NTM</option>
														<?php 
														$y = mysqli_query($con,"SELECT * from kelas");
														while ($u = mysqli_fetch_array($y)) {
															?>
															<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
															<?php 
														}
														?>
													</select>
												</center>
											</td>
										</tr>
										<tr>
											<td><center><?php echo $no++; ?></center></td>
											<td>
												<center>
													<select class="select2">
														<option>NTM</option>
														<?php 
														$y = mysqli_query($con,"SELECT * from kelas");
														while ($u = mysqli_fetch_array($y)) {
															?>
															<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
															<?php 
														}
														?>
													</select>
												</center>
												<td>
													<center>
														<select class="select2">
															<option>NTM</option>
															<?php 
															$y = mysqli_query($con,"SELECT * from kelas");
															while ($u = mysqli_fetch_array($y)) {
																?>
																<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																<?php 
															}
															?>
														</select>
													</center>
												</td>
												<td>
													<center>
														<select class="select2">
															<option>NTM</option>
															<?php 
															$y = mysqli_query($con,"SELECT * from kelas");
															while ($u = mysqli_fetch_array($y)) {
																?>
																<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																<?php 
															}
															?>
														</select>
													</center>
												</td>
												<td>
													<center>
														<select class="select2">
															<option>NTM</option>
															<?php 
															$y = mysqli_query($con,"SELECT * from kelas");
															while ($u = mysqli_fetch_array($y)) {
																?>
																<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																<?php 
															}
															?>
														</select>
													</center>
												</td>
												<td>
													<center>
														<select class="select2">
															<option>NTM</option>
															<?php 
															$y = mysqli_query($con,"SELECT * from kelas");
															while ($u = mysqli_fetch_array($y)) {
																?>
																<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																<?php 
															}
															?>
														</select>
													</center>
												</td>
											</tr>
											<tr>
												<td><center><?php echo $no++; ?></center></td>
												<td>
													<center>
														<select class="select2">
															<option>NTM</option>
															<?php 
															$y = mysqli_query($con,"SELECT * from kelas");
															while ($u = mysqli_fetch_array($y)) {
																?>
																<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																<?php 
															}
															?>
														</select>
													</center>
													<td>
														<center>
															<select class="select2">
																<option>NTM</option>
																<?php 
																$y = mysqli_query($con,"SELECT * from kelas");
																while ($u = mysqli_fetch_array($y)) {
																	?>
																	<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																	<?php 
																}
																?>
															</select>
														</center>
													</td>
													<td>
														<center>
															<select class="select2">
																<option>NTM</option>
																<?php 
																$y = mysqli_query($con,"SELECT * from kelas");
																while ($u = mysqli_fetch_array($y)) {
																	?>
																	<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																	<?php 
																}
																?>
															</select>
														</center>
													</td>
													<td>
														<center>
															<select class="select2">
																<option>NTM</option>
																<?php 
																$y = mysqli_query($con,"SELECT * from kelas");
																while ($u = mysqli_fetch_array($y)) {
																	?>
																	<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																	<?php 
																}
																?>
															</select>
														</center>
													</td>
													<td>
														<center>
															<select class="select2">
																<option>NTM</option>
																<?php 
																$y = mysqli_query($con,"SELECT * from kelas");
																while ($u = mysqli_fetch_array($y)) {
																	?>
																	<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																	<?php 
																}
																?>
															</select>
														</center>
													</td>
												</tr>
												<tr>
													<td><center><?php echo $no++; ?></center></td>
													<td>
														<center>
															<select class="select2">
																<option>NTM</option>
																<?php 
																$y = mysqli_query($con,"SELECT * from kelas");
																while ($u = mysqli_fetch_array($y)) {
																	?>
																	<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																	<?php 
																}
																?>
															</select>
														</center>
														<td>
															<center>
																<select class="select2">
																	<option>NTM</option>
																	<?php 
																	$y = mysqli_query($con,"SELECT * from kelas");
																	while ($u = mysqli_fetch_array($y)) {
																		?>
																		<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																		<?php 
																	}
																	?>
																</select>
															</center>
														</td>
														<td>
															<center>
																<select class="select2">
																	<option>NTM</option>
																	<?php 
																	$y = mysqli_query($con,"SELECT * from kelas");
																	while ($u = mysqli_fetch_array($y)) {
																		?>
																		<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																		<?php 
																	}
																	?>
																</select>
															</center>
														</td>
														<td>
															<center>
																<select class="select2">
																	<option>NTM</option>
																	<?php 
																	$y = mysqli_query($con,"SELECT * from kelas");
																	while ($u = mysqli_fetch_array($y)) {
																		?>
																		<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																		<?php 
																	}
																	?>
																</select>
															</center>
														</td>
														<td>
															<center>
																<select class="select2">
																	<option>NTM</option>
																	<?php 
																	$y = mysqli_query($con,"SELECT * from kelas");
																	while ($u = mysqli_fetch_array($y)) {
																		?>
																		<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																		<?php 
																	}
																	?>
																</select>
															</center>
														</td>
													</tr>
													<tr>
														<td><center><?php echo $no++; ?></center></td>
														<td>
															<center>
																<select class="select2">
																	<option>NTM</option>
																	<?php 
																	$y = mysqli_query($con,"SELECT * from kelas");
																	while ($u = mysqli_fetch_array($y)) {
																		?>
																		<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																		<?php 
																	}
																	?>
																</select>
															</center>
															<td>
																<center>
																	<select class="select2">
																		<option>NTM</option>
																		<?php 
																		$y = mysqli_query($con,"SELECT * from kelas");
																		while ($u = mysqli_fetch_array($y)) {
																			?>
																			<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																			<?php 
																		}
																		?>
																	</select>
																</center>
															</td>
															<td>
																<center>
																	<select class="select2">
																		<option>NTM</option>
																		<?php 
																		$y = mysqli_query($con,"SELECT * from kelas");
																		while ($u = mysqli_fetch_array($y)) {
																			?>
																			<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																			<?php 
																		}
																		?>
																	</select>
																</center>
															</td>
															<td>
																<center>
																	<select class="select2">
																		<option>NTM</option>
																		<?php 
																		$y = mysqli_query($con,"SELECT * from kelas");
																		while ($u = mysqli_fetch_array($y)) {
																			?>
																			<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																			<?php 
																		}
																		?>
																	</select>
																</center>
															</td>
															<td>
																<center>
																	<select class="select2">
																		<option>NTM</option>
																		<?php 
																		$y = mysqli_query($con,"SELECT * from kelas");
																		while ($u = mysqli_fetch_array($y)) {
																			?>
																			<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																			<?php 
																		}
																		?>
																	</select>
																</center>
															</td>
														</tr>
														<tr>
															<td><center><?php echo $no++; ?></center></td>
															<td>
																<center>
																	<select class="select2">
																		<option>NTM</option>
																		<?php 
																		$y = mysqli_query($con,"SELECT * from kelas");
																		while ($u = mysqli_fetch_array($y)) {
																			?>
																			<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																			<?php 
																		}
																		?>
																	</select>
																</center>
																<td>
																	<center>
																		<select class="select2">
																			<option>NTM</option>
																			<?php 
																			$y = mysqli_query($con,"SELECT * from kelas");
																			while ($u = mysqli_fetch_array($y)) {
																				?>
																				<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																				<?php 
																			}
																			?>
																		</select>
																	</center>
																</td>
																<td>
																	<center>
																		<select class="select2">
																			<option>NTM</option>
																			<?php 
																			$y = mysqli_query($con,"SELECT * from kelas");
																			while ($u = mysqli_fetch_array($y)) {
																				?>
																				<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																				<?php 
																			}
																			?>
																		</select>
																	</center>
																</td>
																<td>
																	<center>
																		<select class="select2">
																			<option>NTM</option>
																			<?php 
																			$y = mysqli_query($con,"SELECT * from kelas");
																			while ($u = mysqli_fetch_array($y)) {
																				?>
																				<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																				<?php 
																			}
																			?>
																		</select>
																	</center>
																</td>
																<td>
																	<center>
																		<select class="select2">
																			<option>NTM</option>
																			<?php 
																			$y = mysqli_query($con,"SELECT * from kelas");
																			while ($u = mysqli_fetch_array($y)) {
																				?>
																				<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																				<?php 
																			}
																			?>
																		</select>
																	</center>
																</td>
															</tr>
															<tr>
																<td><center><?php echo $no++; ?></center></td>
																<td>
																	<center>
																		<select class="select2">
																			<option>NTM</option>
																			<?php 
																			$y = mysqli_query($con,"SELECT * from kelas");
																			while ($u = mysqli_fetch_array($y)) {
																				?>
																				<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																				<?php 
																			}
																			?>
																		</select>
																	</center>
																	<td>
																		<center>
																			<select class="select2">
																				<option>NTM</option>
																				<?php 
																				$y = mysqli_query($con,"SELECT * from kelas");
																				while ($u = mysqli_fetch_array($y)) {
																					?>
																					<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																					<?php 
																				}
																				?>
																			</select>
																		</center>
																	</td>
																	<td>
																		<center>
																			<select class="select2">
																				<option>NTM</option>
																				<?php 
																				$y = mysqli_query($con,"SELECT * from kelas");
																				while ($u = mysqli_fetch_array($y)) {
																					?>
																					<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																					<?php 
																				}
																				?>
																			</select>
																		</center>
																	</td>
																	<td>
																		<center>
																			<select class="select2">
																				<option>NTM</option>
																				<?php 
																				$y = mysqli_query($con,"SELECT * from kelas");
																				while ($u = mysqli_fetch_array($y)) {
																					?>
																					<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																					<?php 
																				}
																				?>
																			</select>
																		</center>
																	</td>
																	<td>
																		<center>
																			<select class="select2">
																				<option>NTM</option>
																				<?php 
																				$y = mysqli_query($con,"SELECT * from kelas");
																				while ($u = mysqli_fetch_array($y)) {
																					?>
																					<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																					<?php 
																				}
																				?>
																			</select>
																		</center>
																	</td>
																</tr>
																<tr>
																	<td><center><?php echo $no++; ?></center></td>
																	<td>
																		<center>
																			<select class="select2">
																				<option>NTM</option>
																				<?php 
																				$y = mysqli_query($con,"SELECT * from kelas");
																				while ($u = mysqli_fetch_array($y)) {
																					?>
																					<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																					<?php 
																				}
																				?>
																			</select>
																		</center>
																		<td>
																			<center>
																				<select class="select2">
																					<option>NTM</option>
																					<?php 
																					$y = mysqli_query($con,"SELECT * from kelas");
																					while ($u = mysqli_fetch_array($y)) {
																						?>
																						<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																						<?php 
																					}
																					?>
																				</select>
																			</center>
																		</td>
																		<td>
																			<center>
																				<select class="select2">
																					<option>NTM</option>
																					<?php 
																					$y = mysqli_query($con,"SELECT * from kelas");
																					while ($u = mysqli_fetch_array($y)) {
																						?>
																						<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																						<?php 
																					}
																					?>
																				</select>
																			</center>
																		</td>
																		<td>
																			<center>
																				<select class="select2">
																					<option>NTM</option>
																					<?php 
																					$y = mysqli_query($con,"SELECT * from kelas");
																					while ($u = mysqli_fetch_array($y)) {
																						?>
																						<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																						<?php 
																					}
																					?>
																				</select>
																			</center>
																		</td>
																		<td>
																			<center>
																				<select class="select2">
																					<option>NTM</option>
																					<?php 
																					$y = mysqli_query($con,"SELECT * from kelas");
																					while ($u = mysqli_fetch_array($y)) {
																						?>
																						<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																						<?php 
																					}
																					?>
																				</select>
																			</center>
																		</td>
																	</tr>
																	<tr>
																		<td><center><?php echo $no++; ?></center></td>
																		<td>
																			<center>
																				<select class="select2">
																					<option>NTM</option>
																					<?php 
																					$y = mysqli_query($con,"SELECT * from kelas");
																					while ($u = mysqli_fetch_array($y)) {
																						?>
																						<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																						<?php 
																					}
																					?>
																				</select>
																			</center>
																			<td>
																				<center>
																					<select class="select2">
																						<option>NTM</option>
																						<?php 
																						$y = mysqli_query($con,"SELECT * from kelas");
																						while ($u = mysqli_fetch_array($y)) {
																							?>
																							<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																							<?php 
																						}
																						?>
																					</select>
																				</center>
																			</td>
																			<td>
																				<center>
																					<select class="select2">
																						<option>NTM</option>
																						<?php 
																						$y = mysqli_query($con,"SELECT * from kelas");
																						while ($u = mysqli_fetch_array($y)) {
																							?>
																							<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																							<?php 
																						}
																						?>
																					</select>
																				</center>
																			</td>
																			<td>
																				<center>
																					<select class="select2">
																						<option>NTM</option>
																						<?php 
																						$y = mysqli_query($con,"SELECT * from kelas");
																						while ($u = mysqli_fetch_array($y)) {
																							?>
																							<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																							<?php 
																						}
																						?>
																					</select>
																				</center>
																			</td>
																			<td>
																				<center>
																					<select class="select2">
																						<option>NTM</option>
																						<?php 
																						$y = mysqli_query($con,"SELECT * from kelas");
																						while ($u = mysqli_fetch_array($y)) {
																							?>
																							<option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
																							<?php 
																						}
																						?>
																					</select>
																				</center>
																			</td>
																		</tr>
																		<tr>
																			<th><center>jumlah</center></th>
																			<th><center>kelas x =</center></th>
																			<th><center>kelas xi =</center></th>
																			<th><center>kelas xii =</center></th>
																			<th><center>total =</center></th>
																		</tr>	
																	</tbody>
																	<!-- tabel footer -->
																	<form action="../php/tambah-jurusan.php" method="post">
																		<tfoot>
																			<tr>
																				<div class="form-group">
																					<th><center>Tambahan</center></th>
																					<th colspan="5">
																						<input class="form-control" type="text" id="tambahan" placeholder="tambahan" name="tambahan">
																					</th>
																				</div>
																				<th>
																					<input type="submit" name="submit" class="btn btn-primary"></a>
																					<button class="btn btn-default">Cancel</buttom>
																					</th>
																				</tr>	
																			</tfoot>
																		</form>
																	</table>
																</div>
															</section>		


