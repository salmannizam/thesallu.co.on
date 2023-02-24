<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Resume Builder</title>
  <style type="text/css">
 body {
  font-family: Arial, sans-serif;
}

form {
  width: 500px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

label {
  font-weight: bold;
}

input,
textarea {
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 14px;
  box-sizing: border-box;
}

button {
  width: 100%;
  padding: 10px;
  margin-top: 20px;
  background-color: lightblue;
  color: white;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

#resume {
  width: 500px;
  margin: 20px auto;
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 20px;
  display: none;
}

#resume h2,
#resume h3,
#resume p {
  margin: 0;
}
   
  </style>
  </head>
  <body>
    <h1>Resume Builder</h1>
    <form>
      <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
      </div>
      <div>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
      </div>
      <div>
        <label for="objective">Objective:</label>
        <textarea id="objective" name="objective" required></textarea>
      </div>
      <div>
        <label for="education">Education:</label>
        <textarea id="education" name="education" required></textarea>
      </div>
      <div>
        <label for="experience">Experience:</label>
        <textarea id="experience" name="experience" required></textarea>
      </div>
      <div>
        <label for="skills">Skills:</label>
        <textarea id="skills" name="skills" required></textarea>
      </div>
      <button type="submit">Create Resume</button>
    </form>
    <div id="resume">
      <h2 id="resume-name"></h2>
      <p id="resume-email"></p>
      <p id="resume-address"></p>
      <p id="resume-phone"></p>
      <h3>Objective</h3>
      <p id="resume-objective"></p>
      <h3>Education</h3>
      <p id="resume-education"></p>
      <h3>Experience</h3>
      <p id="resume-experience"></p>
      <h3>Skills</h3>
      <p id="resume-skills"></p>
    </div>
    <script src="script.js"></script>
  </body>
</html>
<script type="text/javascript">
  const form = document.querySelector('form');
const name = document.querySelector('#name');
const email = document.querySelector('#email');
const address = document.querySelector('#address');
const phone = document.querySelector('#phone');
const objective = document.querySelector('#objective');
const education = document.querySelector('#education');
const experience = document.querySelector('#experience');
const skills = document.querySelector('#skills');
const resume = document.querySelector('#resume');
const resumeName = document.querySelector('#resume-name');
const resumeEmail = document.querySelector('#resume-email');
const resumeAddress = document.querySelector('#resume-address');
const resumePhone = document.querySelector('#resume-phone');
const resumeObjective = document.querySelector('#resume-objective');
const resumeEducation = document.querySelector('#resume-education');
const resumeExperience = document.querySelector('#resume-experience');
const resumeSkills = document.querySelector('#resume-skills');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  resumeName.textContent = name.value;
  resumeEmail.textContent = email.value;
  resumeAddress.textContent = address.value;
  resumePhone.textContent = phone.value;
  resumeObjective.textContent = objective.value;
  resumeEducation.textContent = education.value;
  resumeExperience.textContent = experience.value;
  resumeSkills.textContent = skills.value;
  resume.style.display = 'block';
});

</script>