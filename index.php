<?php require_once('./header.php'); ?>

<div class="row">
    <div class="col">
        <h2 class="float-right text-muted">
            سیستم دانشگاه
        </h2>
    </div>
</div>

<div class="row my-2">
    <div class="col">
        <div class="card text-center">
            <div class="card-header" style="height: 40px">
                <h5 class="float-right text-muted" style="position: relative;bottom: 5px">
                    جستجوی استاد
                </h5>
            </div>
            <div class="card-body">
               <div class="row">
                    <div class="col">
                        <form action="" class="d-flex align-items-start" onsubmit="professorForm(event)">
                            <div class="form-group ml-2">
                                <input type="text" class="form-control" name="professorName" placeholder="نام استاد:">
                            </div>
                            <div class="form-group ml-2">
                                <input type="text" class="form-control" name="professorCode" placeholder="کد استاد:">
                            </div>
                            <button type="submit" class="btn btn-sm btn-outline-primary" style="position: relative; top: 2.5px;">جستجو</button>
                        </form>
                        <script type="text/javascript">
                            function professorForm(e){
                                e.preventDefault();
                                var professor_info_form = new FormData();
                                var name = e.target.professorName.value;
                                var code = e.target.professorCode.value;
                                professor_info_form.append('name',(name == null || name == '')? null : name);
                                professor_info_form.append('code',(code == null || code == '')? null : code);
                                professor_info_form.append('type',((name == null || name == '') && (code == null || code == ''))? 3 : 1);

                                var professor_info_tbody = ''
                                fetch("http://localhost/uniSys/api/professor.php",
                                {
                                    method: 'POST',
                                    body: professor_info_form
                                }).then(res => res.json()).then(val =>{
                                    console.log(val)
                                    val.map((value)=>{
                                        professor_info_tbody += `
                                            <tr>
                                                <td>${value.id}</td>
                                                <td>${value.professorCode}</td>
                                                <td>${value.name}</td>
                                                <td>${value.type == 1 ? 'بله' : 'خیر'}</td>
                                                <td>${value.groupName}</td>
                                            </tr>
                                        `;
                                    })
                                    document.getElementById('professor-info').innerHTML = professor_info_tbody;
                                })

                                var professor_course_tbody = '';
                                var professor_course_form = new FormData();
                                professor_course_form.append('name',(name == null || name == '')? null : name);
                                professor_course_form.append('code',(code == null || code == '')? null : code);
                                professor_course_form.append('type',2);

                                fetch("http://localhost/uniSys/api/professor.php",
                                {
                                    method: 'POST',
                                    body: professor_course_form
                                }).then(res => res.json()).then(val =>{
                                    console.log(val)
                                    val.map((value)=>{
                                        professor_course_tbody += `
                                            <tr>
                                                <td>${value.id}</td>
                                                <td>${value.professorCode}</td>
                                                <td>${value.professorName}</td>
                                                <td>${value.courseName}</td>
                                                <td>${value.termName}</td>
                                            </tr>
                                        `;
                                    })
                                    document.getElementById('professor-course').innerHTML = professor_course_tbody;
                                })
                                
                                return false;
                            }
                        </script>
                    </div>
               </div>
               <div class="row my-2">
                    <div class="col text-right">
                        <h5 class="text-muted">مشخصات استاد</h5>
                    </div>
               </div>
               <div class="row">
                    <div class="col">
                        <script>
                            
                        </script>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کد استاد</th>
                                    <th>نام استاد</th>
                                    <th>عضو هیئت علمی</th>
                                    <th>گروه</th>
                                </tr>
                            </thead>
                            <tbody id="professor-info">
                                
                            </tbody>
                        </table>    
                    </div>      
               </div>

               <div class="row my-2">
                    <div class="col text-right">
                        <h5 class="text-muted">دروس درحال تدریس استاد</h5>
                    </div>
               </div>
               <div class="row">
                    <div class="col">
                        <script>
                            
                        </script>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کد استاد</th>
                                    <th>نام استاد</th>
                                    <th>نام درس</th>
                                    <th>ترم</th>
                                </tr>
                            </thead>
                            <tbody id="professor-course">
                                
                            </tbody>
                        </table>    
                    </div>      
               </div>
            </div>
        </div>
    </div>
</div>


<div class="row my-2">
    <div class="col">
        <div class="card text-center">
            <div class="card-header" style="height: 40px">
                <h5 class="float-right text-muted" style="position: relative;bottom: 5px">
                    جستجوی دانشجو
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form class="d-flex align-items-start" onsubmit="studentForm(event);">
                            <div class="form-group ml-2">
                                <input type="text" class="form-control" name="studentName" placeholder="نام دانشجو:">
                            </div>
                            <div class="form-group ml-2">
                                <input type="text" class="form-control" name="studentCode" placeholder="کد دانشجو:">
                            </div>
                            <button type="submit" class="btn btn-sm btn-outline-primary" style="position: relative; top: 2.5px;">جستجو</button>
                        </form>

                        <script type="text/javascript">
                            function studentForm(e){
                                e.preventDefault();
                                var student_info_form = new FormData();
                                var name = e.target.studentName.value;
                                var code = e.target.studentCode.value;
                                student_info_form.append('name',(name == null || name == '')? null : name);
                                student_info_form.append('code',(code == null || code == '')? null : code);
                                student_info_form.append('type',((name == null || name == '') && (code == null || code == ''))? 3 : 1);

                                var student_info_tbody = ''
                                fetch("http://localhost/uniSys/api/student.php",
                                {
                                    method: 'POST',
                                    body: student_info_form
                                }).then(res => res.json()).then(val =>{
                                    console.log(val)
                                    val.map((value)=>{
                                        student_info_tbody += `
                                            <tr>
                                                <td>${value.id}</td>
                                                <td>${value.studentCode}</td>
                                                <td>${value.name}</td>
                                            </tr>
                                        `;
                                    })
                                    document.getElementById('student-info').innerHTML = student_info_tbody;
                                })

                                var student_course_tbody = '';
                                var student_course_form = new FormData();
                                student_course_form.append('name',(name == null || name == '')? null : name);
                                student_course_form.append('code',(code == null || code == '')? null : code);
                                student_course_form.append('type',2);

                                fetch("http://localhost/uniSys/api/student.php",
                                {
                                    method: 'POST',
                                    body: student_course_form
                                }).then(res => res.json()).then(val =>{
                                    console.log(val)
                                    val.map((value)=>{
                                        student_course_tbody += `
                                            <tr>
                                                <td>${value.id}</td>
                                                <td>${value.studentCode}</td>
                                                <td>${value.studentName}</td>
                                                <td>${value.courseName}</td>
                                                <td>${value.termName}</td>
                                            </tr>
                                        `;
                                    })
                                    document.getElementById('student-course').innerHTML = student_course_tbody;
                                })
                                
                                return false;
                            }
                        </script>

                    </div>
               </div>
               <div class="row my-2">
                    <div class="col text-right">
                        <h5 class="text-muted">مشخصات دانشجو</h5>
                    </div>
               </div>
               <div class="row">
                    <div class="col">
                        <script>
                            
                        </script>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کد دانشجو</th>
                                    <th>نام دانشجو</th>
                                </tr>
                            </thead>
                            <tbody id="student-info">
                                
                            </tbody>
                        </table>    
                    </div>      
               </div>

               <div class="row my-2">
                    <div class="col text-right">
                        <h5 class="text-muted">دروس دانشجو</h5>
                    </div>
               </div>
               <div class="row">
                    <div class="col">
                        <script>
                            
                        </script>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کد دانشجو</th>
                                    <th>نام دانشجو</th>
                                    <th>نام درس</th>
                                    <th>ترم</th>
                                </tr>
                            </thead>
                            <tbody id="student-course">
                                
                            </tbody>
                        </table>    
                    </div>      
               </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('./footer.php'); ?>