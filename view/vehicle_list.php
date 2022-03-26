<section class="container mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <form action="index.php" method="POST" id="form-change" class="my-auto col-12 my-1">
                        <input type="hidden" name="action" id="action">
                        <div class="filter-dropdown col-12 my-1">
                            <select class="form-control" id="makeID" name="makeID" onchange="formChange()">
                                <option value="0">All Makes</option>
                                <!-- Loop through each make  -->
                                <?php foreach ($makes as $make) : ?>
                                    <option value="
                            <?php echo $make['id']; ?>"
                                        <?= ($make['id'] == $makeID) ? 'selected' : ''; ?>><?php echo $make['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="filter-dropdown col-12 my-1">
                            <select class="form-control" id="typeID" name="typeID" onchange="formChange()">
                                <option value="0">All Types</option>
                                <!-- Loop through each type  -->
                                <?php foreach ($types as $type) : ?>
                                    <option value="
                            <?php echo $type['id']; ?>"
                                        <?= ($type['id'] == $typeID) ? 'selected' : ''; ?>><?php echo $type['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="filter-dropdown col-12 my-1">
                            <select class="form-control" id="classID" name="classID" onchange="formChange()">
                                <option value="0">All Classes</option>
                                <!-- Loop through each class  -->
                                <?php foreach ($classes as $class) : ?>
                                    <option value="
                        <?php echo $class['id']; ?>"
                                        <?= ($class['id'] == $classID) ? 'selected' : ''; ?>><?php echo $class['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="row mx-auto" id="sort-row">
                            <div class="my-auto col-4">Sort By:</div>
                            <div class="form-check my-auto col-3">
                                <input class="form-check-input" type="radio" name="sort" id="priceSort"
                                       value="1" <?= ($sort !== 0) ? 'checked' : ''; ?> onchange="formChange()">
                                <label class="form-check-label" for="priceSort">
                                    Price
                                </label>
                            </div>
                            <div class="form-check my-auto col-3">
                                <input class="form-check-input" type="radio" name="sort" id="yearSort"
                                       value="0" <?= ($sort === 0) ? 'checked' : ''; ?> onchange="formChange()">
                                <label class="form-check-label" for="yearSort">
                                    Year
                                </label>
                            </div>
                            <div class="my-auto col-1" onclick="sortDirection()">
                                <input type="hidden" name="sortDirection" id="sortDirectionValue"
                                       value="<?php echo $sortDirection; ?>">
                                <i class="fa fa-sort fa-sm py-1 text-white my-auto"></i>
                            </div>
                            <hr>
                            <div class="col-12 mt-2">
                                <button onclick="clearFilters()" class="btn btn-block btn-sm btn-primary">Clear
                                    Filters
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="col-md-4">
                    <?php
                    if (count($vehicles) == 0) {
                        ?>
                        <div id="no-match">
                            <div class="alert alert-danger text-center" role="alert">
                                <h4 class="alert-heading">No Vehicles Match The Current Criteria</h4>
                                <p>Please adjust your filter criteria</p>
                                <p class="mb-0"></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (count($vehicles) > 0) {
        ?>
        <div class="vehicle-table row">
            <table class="table table-light table-sm">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Year</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Type</th>
                    <th scope="col">Class</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                <input type="hidden" name="deleteValue" id="deleteValue">
                <?php foreach ($vehicles as $vehicle) : ?>
                    <tr>
                        <td><?php echo $vehicle['year']; ?></td>
                        <td><?php echo $vehicle['name']; ?></td>
                        <td><?php echo $vehicle['model']; ?></td>
                        <td><?php echo $vehicle['name']; ?></td>
                        <td><?php echo $vehicle['name']; ?></td>
                        <td><?php echo '$' . number_format($vehicle['price'], 2); ?></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php } ?>

</section>