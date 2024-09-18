(function(c) {
	var d = {};
	function a(e) {
		return plupload.translate(e) || e;
	}
	function b(f, e) {
		e.contents().each(function(g, h) {
			h = c(h);
			if (!h.is(".plupload")) {
				h.remove();
			}
		});
		e
				.prepend('<div class="remote" id="'+
						f+
						'_container">'+
		            	

		                '<div class="browse_btn">'+
		                	'<a class="plupload_add add_btn" href="javascript:"></a>'+
		                '</div>'+

		                '<div class="fieldset uploader_home progressing" id="fsUploadProgress">'
		                	+ '<ul id="' + f + '_filelist" class="plupload_filelist"></ul>'
							+ '<div class="upload_total_block">'
								+ '<div class="upload_status"><span class="plupload_upload_status"></span></div>'
								+ '<div class="plupload_file_action"></div>'
								+ '<div class="plupload_file_status"><span class="plupload_total_status">0%</span></div>'
								+ '<div class="plupload_file_size"><span class="plupload_total_loaded">0 b</span> of <span class="plupload_total_file_size">0 b</span></div>'
								+ '<div class="plupload_progress"><div class="plupload_progress_container progressBarContainer"><div class="plupload_progress_bar progressBarInProgress"></div></div></div>'
								+ '<div class="plupload_clearer"><a class="btnStart startstopBtn" href="javascript:">START</a><a class="btnCancel startstopBtn" href="javascript:">CANCEL</a></div>'
							+ '</div>'
						+ '</div>'
		                +'</div><!--end remote-->');

	}
	c.fn.pluploadQueue = function(e) {
		if (e) {
			this
					.each(function() {
						var j, i, k;
						i = c(this);
						k = i.attr("id");
						if (!k) {
							k = plupload.guid();
							i.attr("id", k);
						}
						j = new plupload.Uploader(c.extend({
							dragdrop : true,
							container : k
						}, e));
						d[k] = j;
						function h(l) {
							var n;
							if (l.status == plupload.DONE) {
								n = "plupload_done progressContainer";
							}
							if (l.status == plupload.FAILED) {
								n = "plupload_failed progressContainer";
							}
							if (l.status == plupload.QUEUED) {
								n = "plupload_delete progressContainer";
							}
							if (l.status == plupload.UPLOADING) {
								n = "plupload_uploading progressContainer";
							}
							var m = c("#" + l.id).attr("class", n).find("a")
									.css("display", "block");
							if (l.hint) {
								m.attr("title", l.hint);
							}
						}
						function f() {
							c("span.plupload_total_status", i).html(
									j.total.percent + "%");
							c("div.plupload_progress_bar", i).css("width",
									j.total.percent + "%");

							c("span.plupload_total_loaded", i).html(
									plupload.formatSize(j.total.loaded));
							c("span.plupload_upload_status", i).text(
									a("Uploading %d/%d files").replace(
											/%d\/%d/,
											(j.total.uploaded) + "/"
													+ j.files.length));
						}
						function g() {
							var m = c("ul.plupload_filelist", i).html(""), n = 0, l;
							c
									.each(
											j.files,
											function(p, o) {
												l = "";
												if (o.status == plupload.DONE) {
													if (o.target_name) {
														l += '<input type="hidden" name="'
																+ k
																+ "_"
																+ n
																+ '_tmpname" value="'
																+ plupload
																		.xmlEncode(o.target_name)
																+ '" />';
													}
													l += '<input type="hidden" name="'
															+ k
															+ "_"
															+ n
															+ '_name" value="'
															+ plupload
																	.xmlEncode(o.name)
															+ '" />';
													l += '<input type="hidden" name="'
															+ k
															+ "_"
															+ n
															+ '_status" value="'
															+ (o.status == plupload.DONE
																	? "done"
																	: "failed")
															+ '" />';
													n++;
													c("#" + k + "_count")
															.val(n);
												}
												m
														.append('<li class="progressContainer" id="'
																+ o.id
																+ '"><div class="plupload_file_name progressName">'
																+ o.name
																+ '</div><a class="plupload_file_action progressCancel" href="javascript:"></a><div class="progressPercent plupload_file_status">'
																+ o.percent
																+ '%</div><div class="plupload_file_size progressUploading"><span class="uploaded_size">'
																+ 'Pending upload -'
																+ '</span><span class="progress_text"> File size : </span>'
																+ plupload
																		.formatSize(o.size)
																+ '</div>'
																+ '<div class="progressBarContainer">'
																+ '<div class="progressBarInProgress" style="width: '+o.percent+'%;"></div>'
																+ '</div>'
																+ '<div class="progressTimeRemaining">Pending..</div>'
																+ '<div class="plupload_clearer">&nbsp;</div>'
																+ l + "</li>");
												h(o);
												c(
														"#"
																+ o.id
																+ " a.progressCancel")
														.click(
																function(q) {
																	c("#"+ o.id).remove();
																	q.preventDefault();
																	if($(this).parents("li").first().hasClass("plupload_uploading")){
																		j.stop();
																	}
																	j.removeFile(o);
																	//if($(".progressContainer:visible").length == 0){
																	if($(".plupload_uploading,.plupload_delete").length == 0){
																		$(".progressing").hide();
																	    $(".idle").show();
																	    $(".btnCancel").addClass("disable");
																	}
																});
											});
							c("span.plupload_total_file_size", i).html(
									plupload.formatSize(j.total.size));
							if (j.total.queued === 0) {
								c("span.plupload_add_text", i).text(
										a("Add files."));
							} else {
								c("span.plupload_add_text", i).text(
										j.total.queued + " files queued.");
							}
							c("a.plupload_start", i)
									.toggleClass(
											"plupload_disabled",
											j.files.length == (j.total.uploaded + j.total.failed));
							m[0].scrollTop = m[0].scrollHeight;
							f();
							if (!j.files.length && j.features.dragdrop
									&& j.settings.dragdrop) {
								c("#" + k + "_filelist").append(
										'<li class="plupload_droptext">'
												+ a("Drag files here.")
												+ "</li>");
							}
						}
						j.bind("UploadFile", function(l, m) {
							c("#" + m.id).addClass("plupload_current_file");
						});
						j
								.bind(
										"Init",
										function(l, m) {
											b(k, i);
											if (!e.unique_names && e.rename) {
												c(
														"#"
																+ k
																+ "_filelist div.plupload_file_name span",
														i)
														.live(
																"click",
																function(s) {
																	var q = c(s.target), o, r, n, p = "";
																	o = l
																			.getFile(q
																					.parents("li")[0].id);
																	n = o.name;
																	r = /^(.+)(\.[^.]+)$/
																			.exec(n);
																	if (r) {
																		n = r[1];
																		p = r[2];
																	}
																	q
																			.hide()
																			.after(
																					'<input type="text" />');
																	q
																			.next()
																			.val(
																					n)
																			.focus()
																			.blur(
																					function() {
																						q
																								.show()
																								.next()
																								.remove();
																					})
																			.keydown(
																					function(
																							u) {
																						var t = c(this);
																						if (u.keyCode == 13) {
																							u
																									.preventDefault();
																							o.name = t
																									.val()
																									+ p;
																							q
																									.text(o.name);
																							t
																									.blur();
																						}
																					});
																});
											}
											c("a.plupload_add", i).attr("id",
													k + "_browse");
											l.settings.browse_button = k
													+ "_browse";
											if (l.features.dragdrop
													&& l.settings.dragdrop) {
												l.settings.drop_element = k
														+ "_filelist";
												c("#" + k + "_filelist")
														.append(
																'<li class="plupload_droptext">'
																		+ a("Drag files here.")
																		+ "</li>");
											}
//											c("#" + k + "_container").attr(
//													"title",
//													"Using runtime: "
//															+ m.runtime);
											c("a.plupload_start", i)
													.click(
															function(n) {
																if (!c(this)
																		.hasClass(
																				"plupload_disabled")) {
																	j.start();
																}
																n
																		.preventDefault();
															});
											c("a.plupload_stop", i).click(
													function(n) {
														n.preventDefault();
														j.stop();
													});
											c("a.plupload_start", i).addClass(
													"plupload_disabled");
										});
						j.init();
						j
								.bind(
										"Error",
										function(l, o) {
											var m = o.file, n;
											if (m) {
												n = o.message;
												if (o.details) {
													n += " (" + o.details + ")";
												}
												if (o.code == plupload.FILE_SIZE_ERROR) {
													alert(a("Error: File too large: ")
															+ m.name);
												}
												if (o.code == plupload.FILE_EXTENSION_ERROR) {
													alert(a("Error: Invalid file extension: ")
															+ m.name);
												}
												m.hint = n;
												c("#" + m.id).attr("class",
														"plupload_failed")
														.find("a").css(
																"display",
																"block").attr(
																"title", n);
											}
										});
						j
								.bind(
										"StateChanged",
										function() {
											if (j.state === plupload.STARTED) {
												c("div.plupload_buttons",i).hide();
												//c("span.plupload_upload_status,div.plupload_progress,a.plupload_stop",i).show();
												c(
														"span.plupload_upload_status",
														i)
														.text(
																"Uploaded "
																		+ j.total.uploaded
																		+ "/"
																		+ j.files.length
																		+ " files");
//												if (e.multiple_queues) {
//													c(
//															"span.plupload_total_status,span.plupload_total_file_size",
//															i).show()
//												}
											} else {
												g();
//												c(
//														"a.plupload_stop,div.plupload_progress",
//														i).hide();
												c("a.plupload_delete", i).css(
														"display", "block");
											}
										});
						j.bind("QueueChanged", g);
						j.bind("FileUploaded", function(l, m) {
							h(m);
						});
						j
								.bind(
										"UploadProgress",
										function(l, m) {
											c(
													"#"
															+ m.id
															+ " div.plupload_file_status",
													i).html(m.percent + "%");
											c(
													"#"
															+ m.id
															+ " .uploaded_size",
													i).html(plupload.formatSize(m.loaded,2));

											var timeRemains = plupload.formatTime((m.size-m.loaded)/j.total.bytesPerSec);

											c(
													"#"
															+ m.id
															+ " .progressTimeRemaining",
													i).html(timeRemains+"");

											c(
													"#"
															+ m.id
															+ " .progress_text",
													i).html(" uploaded of ");
											c(
													"#"
															+ m.id
															+ " .progressBarInProgress",
													i).css("width", m.percent+"%");

											h(m);
											f();
											if (e.multiple_queues
													&& j.total.uploaded
															+ j.total.failed == j.files.length) {
												c(
														".plupload_buttons",
														i).css("display",
														"inline");
												c(".plupload_start", i)
														.addClass(
																"plupload_disabled");
//												c(
//														"span.plupload_total_status,span.plupload_total_file_size",
//														i).hide();
											}
										});
						if (e.setup) {
							e.setup(j);
						}
					});
			return this;
		} else {
			return d[c(this[0]).attr("id")];
		}
	};
})(jQuery);;