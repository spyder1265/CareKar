<div class="modal-form-container">
    <div class="left-form-container">

        <!-- Job Title input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="jobTitle">Job Title :</label>
            <input type="text" id="jobTitle" placeholder="Title" class="form-control" name="job_title" />
        </div>

        <!-- Job Description -->
        <div class="form-outline mb-4">
            <label for="jDescription">Job Description </label>
            <textarea class="form-control" id="jDescription" rows="3" name="jD"></textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="form-outline mb-4">
                    <label class="form-label" for="price">Price :</label>
                    <input type="text" id="price" placeholder="$" class="form-control" name="price" />
                </div>
            </div>
        </div>

    </div>

    <div class="right-form-container">


        <div class="form-outline mb-4">
            <label class="form-label" for="email">Email address :</label>
            <input type="email" id="email" placeholder="user@company.com" class="form-control" name="email" />
        </div>

        <!-- phone input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="phone">Customer tel :</label>
            <input type="tel" id="phone" placeholder="(0) 000 - 000 - 0000" class="form-control" name="phone" />
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="id">Job ID :</label>
            <input type="text" id="id" class="form-control" name="J_id" readonly required />

        </div>
        <div class="form-outline mb-4">
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="pending">pending</option>
                    <option value="in_progress">in progress</option>
                    <option value="completed">completed</option>
                </select>
            </div>
        </div>

    </div>
</div>