
<div class="modal" id="editMessageModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              
                    <span type="button" class="close fa fa-close" data-dismiss="modal"></span>
                
            </div>
            <div class="modal-body">
                <div class="panel panel-default" style="margin-top:6px">
                
                    <section class="panel-body">
                        <form name="data" id="edit-data"
                                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                            <div class="row mt-3">
								<div class="col-md-12">
                                    <input type="hidden" name="message_id" id="message_id" required>
									<div class="form-group">
										<label for="exampleInputEmail1">Subject: </label>
										<input type="text" class="form-control"  disabled
                                         id="subject">
									</div>
								</div>

                            </div>
                            <div class="row mt-3">
								<div class="col-md-12">
									<div class="form-group">
										<label for="exampleInputPassword1">Question Body:</label>
										<textarea class="form-control"
                                        id="body" disabled></textarea>
									</div>
								</div>
							</div>

                            <div class="row mt-3">
								<div class="col-md-12">
									<div class="form-group">
										<label for="exampleInputPassword1">Response:</label>
										<textarea name="response" class="form-control"
                                        id="response"
                                         required placeholder="Enter your response here" required></textarea>
									</div>
								</div>
							</div>

                            <input type="submit" id="update" class="btn btn-primary btn-block"
                                value="Reply">
                        </form>


                    </section>
                </div>
            </div>
    </div>

</div>
</div>