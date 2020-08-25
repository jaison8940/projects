<?php 
	class Job{
		private $db;

		public function __construct(){
			$this->db = new Database;
		}
		public function getAllJobs(){
			$this->db->query("SELECT jobs.*, categories.name AS cname 
					FROM jobs 
					INNER JOIN categories 
					ON jobs.category_id = categories.id 
					ORDER BY post_date DESC");

			$res = $this->db->resultSet();

			return $res;


		}

		public function getCategories(){
			$this->db->query("SELECT * from categories");

			$res = $this->db->resultSet();

			return $res;


		}

		public function getByCategory($cat){
			$this->db->query("SELECT jobs.*, categories.name AS cname 
					FROM jobs 
					INNER JOIN categories 
					ON jobs.category_id = categories.id
					WHERE jobs.category_id = $cat
					ORDER BY post_date DESC");

			$res = $this->db->resultSet();

			return $res;


		}

		public function getCategory($cat){
			$this->db->query("SELECT name from categories WHERE id=:category_id");

			$this->db->bind(':category_id',$cat);
			$res = $this->db->single();


			return $res;


		}


		public function getJob($id){
			$this->db->query("SELECT * from jobs WHERE id=:id");

			$this->db->bind(':id',$id);
			$res = $this->db->single();


			return $res;


		}
		public function create($data){
			$this->db->query("INSERT INTO jobs (category_id, job_title, company, description, location, salary, contact_user,  contact_email, user_id, country) VALUES (:category_id, :job_title, :company, :description, :location, :salary, :contact_user,  :contact_email, :user_id, :country)");

			$this->db->bind(':category_id',$data['category_id']);
			$this->db->bind(':job_title',$data['job_title']);
			$this->db->bind(':company',$data['company']);
			$this->db->bind(':description',$data['description']);
			$this->db->bind(':location',$data['location']);
			$this->db->bind(':salary',$data['salary']);
			$this->db->bind(':contact_user',$data['contact_user']);
			$this->db->bind(':contact_email',$data['contact_email']);
			$this->db->bind(':user_id',$data['user_id']);
			$this->db->bind(':country',$data['country']);

			if($this->db->execute()){
				return true;
			}
			else {
				return false;
			}

		}

		public function delete($id){
			$this->db->query("DELETE FROM jobs WHERE id = $id");

			

			if($this->db->execute()){
				return true;
			}
			else {
				return false;
			}


		}

		public function update($id, $data){
			$this->db->query("UPDATE jobs SET company = :company, category_id = :category_id, job_title = :job_title, description = :description, location = :location, salary = :salary, contact_user = :contact_user,	contact_email = :contact_email WHERE id = $id");
			$this->db->bind(':company',$data['company']);
			$this->db->bind(':category_id',$data['category_id']);
			$this->db->bind(':job_title',$data['job_title']);
			$this->db->bind(':description',$data['description']);
			$this->db->bind(':location',$data['location']);
			$this->db->bind(':salary',$data['salary']);
			$this->db->bind(':contact_user',$data['contact_user']);
			$this->db->bind(':contact_email',$data['contact_email']);

			if($this->db->execute()){
				return true;
			}
			else {
				return false;
			}


		}

		public function auth($data){
			$this->db->query("SELECT count(*) as c FROM user_details WHERE email = :email");

			$this->db->bind(':email',$data['email']);
			// $this->db->bind(':password',$data['password']);
			$res = $this->db->single();

			if($res->c)
			{
				return false;
			}
			else{
				return true;

			}
			


		}

		public function enter_user_creds($data){
			

			$this->db->query("INSERT INTO user_details (email, password) VALUES (:email, :password)");

			$this->db->bind(':email',$data['email']);
			$this->db->bind(':password',$data['password']);


			if($this->db->execute()){
				return true;
			}
			else {
				return false;
			}
		

		}

		public function getUserID($data){
			$this->db->query("SELECT id FROM user_details WHERE email = :email AND password = :password");

			$this->db->bind(':email',$data['email']);
			$this->db->bind(':password',$data['password']);
			$res = $this->db->single();


			return $res;


		}

		public function getMyJobs($uid){
			$this->db->query("SELECT jobs.*,count(job_applications.id) as count FROM jobs left join job_applications on jobs.id=job_applications.job_id group by jobs.id having jobs.user_id=$uid");

			$res = $this->db->resultSet();

			return $res;


		}


		public function getCountries(){
			$this->db->query("SELECT * from countries order by name");

			$res = $this->db->resultSet();

			return $res;


		}
		public function getStates($id){
			$this->db->query("SELECT * from states where country_id = $id order by name");

			$res = $this->db->resultSet();

			return $res;


		}
		public function getCities($id){
			$this->db->query("SELECT * from cities where state_id = $id order by name");

			$res = $this->db->resultSet();

			return $res;


		}

		public function getQualifications(){
			$this->db->query("SELECT * from qualification");

			$res = $this->db->resultSet();

			return $res;


		}

		public function getCourses($id){
			$this->db->query("SELECT * from courses where q_id=$id");

			$res = $this->db->resultSet();

			return $res;


		}

		public function getSpecializations(){
			$this->db->query("SELECT * from specialization ORDER BY name");

			$res = $this->db->resultSet();

			return $res;


		}

		public function getColleges($id){
			$this->db->query("SELECT * from webometric_universities where country_id=$id");

			$res = $this->db->resultSet();

			return $res;


		}

		public function getBoards(){
			$this->db->query("SELECT * from boards");

			$res = $this->db->resultSet();

			return $res;


		}

		public function getPhonecode($id){
			$this->db->query("SELECT phonecode FROM countries WHERE id=$id");

			$res = $this->db->single();

			return $res;


		}

		public function validate($data){
			if(empty($data) || $data == 0) {
				return 'None';
			}
			else{
				return $data;
			}
		}

		public function applyToJob($data){
			$this->db->query("insert into job_applications(first_name, last_name, dob, address, city, state, country, qualification, course, specialization, university_or_college, passing_year, course_type, cgpa, arrear, board, percentage, email, contact_no, user_id, job_id) values(:first_name, :last_name, :dob, :address, :city, :state, :country, :qualification, :course, :specialization, :university_or_college, :passing_year, :course_type, :cgpa, :arrear, :board, :percentage, :email, :contact_no, :user_id, :job_id)");
			$this->db->bind(':first_name',$data['fname']);
			$this->db->bind(':last_name',$data['lname']);
			$this->db->bind(':dob',$data['dob']);
			$this->db->bind(':address',$data['address']);
			$this->db->bind(':city',$data['city']);
			$this->db->bind(':state',$data['state']);
			$this->db->bind(':country',$data['country']);
			$this->db->bind(':qualification',$data['qualification']);

			$this->db->bind(':course',$data['course']);
			$this->db->bind(':specialization',$data['specialization']);
			$this->db->bind(':university_or_college',$data['university_or_college']);
			$this->db->bind(':passing_year',$data['passing_year']);
			$this->db->bind(':course_type',$data['c_type']);
			$this->db->bind(':cgpa',$data['cgpa']);
			$this->db->bind(':arrear',$data['arrear']);
			$this->db->bind(':board',$data['board']);

			$this->db->bind(':percentage',$data['percentage']);
			$this->db->bind(':email',$data['email']);
			$this->db->bind(':contact_no',$data['contact_no']);
			$this->db->bind(':user_id',$data['user_id']);
			$this->db->bind(':job_id',$data['job_id']);


			if($this->db->execute()){
				return true;
			}
			else {
				return false;
			}


		}

		public function getCountry($id){
			$this->db->query("select name from countries where id=$id");

			$res = $this->db->single();

			return $res;


		}
		public function getQualification($id){
			$this->db->query("select name from qualification where id=$id");

			$res = $this->db->single();

			return $res;


		}

		public function checkIfApplied($id,$user_id){
			$this->db->query("SELECT count(*) as c FROM job_applications WHERE job_id=$id and user_id = $user_id");

			$res = $this->db->single();

			if($res->c) {
				return true;
			}
			else{
				return false;
			}


		}

		
		public function getAllAppliedJobs($uid){
			$this->db->query("SELECT jobs.* 
					FROM jobs 
					INNER JOIN job_applications 
					ON jobs.id = job_applications.job_id
					WHERE job_applications.user_id = $uid
					ORDER BY applied_date DESC");

			$res = $this->db->resultSet();

			return $res;


		}

		public function getAppsDetails($job_id){
			$this->db->query("SELECT * 
					FROM job_applications 
					WHERE job_id = $job_id order by applied_date");

			$res = $this->db->resultSet();

			return $res;


		}
		public function getAppsDetailsSpecific($job_id, $uid){
			$this->db->query("SELECT * 
					FROM job_applications 
					WHERE job_id = $job_id and user_id = $uid order by applied_date");

			$res = $this->db->single();

			return $res;


		}

		public function getMail($id){
			$this->db->query('select email from user_details where id = (select user_id from jobs where id = :id)');
			$this->db->bind(':id',$id);
			$res = $this->db->single();

			return $res->email;
		}

		public function getJobDet($id){
			$this->db->query("SELECT * FROM jobs WHERE id = $id");

			$res = $this->db->single();

			return $res;
		}

		public function getUserMail($id){
			$this->db->query("SELECT email FROM user_details WHERE id = $id");

			$res = $this->db->single();

			return $res->email;
		}


	}