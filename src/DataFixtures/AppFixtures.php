<?php

namespace App\DataFixtures;

use App\Entity\Profile;
use App\Entity\Projects;
use App\Entity\Recommendations;
use App\Entity\Resume;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $profile = new Profile();
        $profile->setName('Victoria-Elena Lazar');
        $profile->setPhone('+40 733 512 068');
        $profile->setEmail('victoria.elena01@yahoo.com');
        $profile->setLocation('Ploiesti, Romania');
        $profile->setBio('I am a dog lover: My furry companion is not just a pet, 
                              but a cherished family member.
                              Passionate Traveler: From bustling cities to serene landscapes, 
                              I am always ready to embark on new adventures.
                              Dance Enthusiast: When the music plays, 
                              you will find me on the dance floor.
                              Nature Admirer: There is nothing like the tranquility of nature to soothe the soul. 
                              Hiking trails, or simply enjoying a moment of quiet reflection in the great outdoors is where I find peace.
    ');
        $profile->setImage('');
        $manager->persist($profile);

        $resume = new Resume();
        $resume->setSummary('A highly motivated and results-driven professional 
                                     with a diverse background spanning roles in PHP Backend internship, 
                                     assurance, and audit assistance, contributing to a well-rounded skill set and a comprehensive understanding of various domains. 
                                     Over the preceding 7 months, I have spearheaded the development of 6 projects of varying complexity as part of the Jagaad Academy Program. 
                                     Additionally, I continue to engage in project development encompassing diverse frameworks and complexity levels following the completion of the course. 
                                     A staunch advocate, I am characterized by my idealism, principled approach, and a deep sense of responsibility. 
                                     Proficient in seamlessly blending analytical acumen with innovative problem-solving techniques, 
                                     coupled with adept time management skills and a strong sense of empathy.');
        $resume->setSkills('Programming Languages/ Technologies:
                                 • PHP
                                 • HTML and CSS
                                 • OOP/Design Patterns
                                 • Bash Scripting
                                 • JavaScript
                                 Frameworks/Libraries
                                 • Symfony
                                 • Laravel
                                 • Slim
                                 • Bootstrap
                                 Databases
                                 • MySQL/MariaDB
                                 Bug Tracking/Project Management Software/CVS/Build Automation:
                                 ● XDebug
                                 ● Git
                                 ● Docker
                                 Others:
                                 • Microsoft 365
                                 • PostMan/Insomnia
                                 Languages
                                 ● English – Advanced
                                 ● Romanian - Native');
        $resume->setProfessionalExperience('Jagaad Academy (Remote) Duration: 7 months ( April 2023 – November 2023) 
                                                             Role: PHP Backend internship Description: Gaining hands-on experience in server-side scripting with PHP, 
                                                             developing web applications, and database management. 
                                                             Achievements: ● Successfully developing and optimizing PHP scripts for web applications, 
                                                             improving performance and reducing load times. 
                                                             ● Troubleshooting and resolving technical issues and bugs in the backend code, 
                                                             enhancing the reliability of the web application.
                                                             ● Becoming one of the best 3 students of the program.
                                                             ● Following code design principles to deliver high-quality code.
                                                             ● Learning and applying security best practices to protect web applications from vulnerabilities 
                                                             and threats
                                                             Tools & Technologies: PHP 8, Slim Framework, Symfony, PHPStorm, VSCode, Insomnia, HTML, 
                                                             CSS, Bootstrap, Docker, Swagger API Documentation, Unit Tests, Doctrine ORM, PHPStan, Firebase JWT, 
                                                             Relational Database');
        $resume->setEducation('Backend PHP software development
                                       Jagaad Academy
                                       Entrepreneurial, Financial and Juridic skills
                                       INNOTECH- Student involved in the development of successful Start-ups
                                       Public Administration
                                       University of Bucharest');

        $manager->persist($resume);

        $project = new Projects();
        $project->setTitle('Online Learning Platform');
        $project->setDescription("Online Learning Platform -> a dynamic educational hub crafted with Symfony framework and Docker technology. 
                                           Designed with both students and instructors in mind, the platform offers an intuitive interface 
                                           where learners can easily enroll in courses and progress through engaging lessons.
                                           The student-centric approach ensures that only authenticated users have access to course materials, 
                                           fostering a secure and conducive learning environment. 
                                           Instructors are empowered with the ability to seamlessly add, edit, and remove courses and lessons, 
                                           providing them with the flexibility needed to deliver top-quality content.
                                           Additionally, the platform features a comprehensive admin panel, 
                                           granting administrators the authority to efficiently manage courses, lessons, enrollments, and course completions. 
                                           This centralized control ensures smooth operations and enhances the overall user experience.");
        $project->setVideo('uploads/videos/OLP.mp4');
        $manager->persist($project);

        $project1 = new Projects();
        $project1->setTitle('Micro Posts');
        $project1->setDescription("Micro Posts -> a robust application developed using the Symfony framework and Docker technology. 
                                            This platform empowers users to create accounts, verify their emails, and unleash their thoughts through creating posts.
                                             Engage with a vibrant community by adding comments to others' posts and personalize your profile 
                                             with a profile picture and personal details. Furthermore, users have the ability to connect with others,
                                              follow their updates, and discover a stream of engaging posts from their network.");
        $project1->setVideo('uploads/videos/Micro-Posts.mp4');
        $manager->persist($project1);

        $project2 = new Projects();
        $project2->setTitle('Job Board');
        $project2->setDescription("Job Board -> a powerful platform developed with Laravel, designed to streamline the job search process
                                             for both employers and applicants. Employers can effortlessly post job openings, 
                                             efficiently manage applications, and find the best candidates for their positions.
                                             For job seekers, the platform offers a user-friendly interface to browse job listings, 
                                             apply with ease, and showcase their skills with salary expectations and CV uploads. 
                                             ");
        $project2->setVideo('uploads/videos/job-board.mp4');
        $manager->persist($project2);

        $project3 = new Projects();
        $project3->setTitle('Events Management API');
        $project3->setDescription("Event Management System -> a sophisticated API built on the robust Laravel framework. 
                                            This comprehensive system offers a seamless experience for organizing and overseeing events with ease.
                                            With a focus on user-friendly CRUD operations, our system allows effortless creation, updating, and deletion of events. 
                                            Stay informed and connected with the integrated email notification system, ensuring all stakeholders are kept up-to-date with the latest event details.
                                            Security is paramount, and the system includes robust features to safeguard your data and ensure a smooth, worry-free experience. 
                                            ");
        $project3->setVideo('uploads/videos/event-management.mp4');
        $manager->persist($project3);

        $project4 = new Projects();
        $project4->setTitle('Payment API');
        $project4->setDescription("Payment API -> built on the versatile Slim Framework, offers comprehensive information on customers, 
                                            their baskets, transactions, and available payment methods.
                                            Through this project, I delved into the intricacies of REST API development, 
                                            utilizing Slim Framework, Docker, and the ORM Doctrine. 
                                            This immersive learning experience not only equipped me with the technical skills to build robust APIs, 
                                            but also provided valuable insights into effective API design and implementation.");
        $project4->setVideo('uploads/videos/payment-api.mp4');
        $manager->persist($project4);

        $recommendation = new Recommendations();
        $recommendation->setImage('uploads/referrers/hennadii.jpeg');
        $recommendation->setName('Hennadii Shvedko');
        $recommendation->setPosition('Software Developer at Copernicus GmbHSoftware');
        $recommendation->setRecommendation('In the classroom, Victoria-Elena consistently stood out as a top-performing student. 
                                                         She not only demonstrated a strong grasp of the subject matter but also exhibited a keen interest 
                                                         in PHP programming and API development, particularly within the Symfony PHP framework. 
                                                         Her ability to apply these technical concepts in practical scenarios was truly exceptional, 
                                                         resulting in high-quality and efficient code solutions.

                                                         What distinguishes Victoria-Elena is her relentless pursuit of excellence. 
                                                         She consistently goes above and beyond to seek deeper knowledge, 
                                                         actively engaging in class discussions and sharing valuable insights related to 
                                                         PHP development. Her dedication to staying updated with the latest industry trends 
                                                         and her proactive approach to seeking out additional resources showcase her commitment 
                                                         to continuous learning.');
        $manager->persist($recommendation);

        $recommendation1 = new Recommendations();
        $recommendation1->setImage('uploads/referrers/tosin.jpeg');
        $recommendation1->setName('Tosin Akinbowa');
        $recommendation1->setPosition('Backend developer || PHP || Laravel || Symfony');
        $recommendation1->setRecommendation("During our time together at Jagaad Academy, 
                                                          I had the pleasure of working alongside Victoria-Elena Lazar, 
                                                          and I wholeheartedly recommend her. Victoria consistently demonstrated a 
                                                          high level of dedication and hard work throughout our internship program. 
                                                          Her commitment to excellence was evident in her consistent and reliable contributions. 
                                                          Always ready to lend a helping hand, Victoria's teamwork spirit greatly enhanced 
                                                          our collaborative efforts. She is not only a reliable and diligent colleague but also 
                                                          someone who brings a positive and supportive energy to the team. Victoria's passion for her 
                                                          work and her willingness to go the extra mile make her an asset to any professional environment");
        $manager->persist($recommendation1);

        $recommendation2 = new Recommendations();
        $recommendation2->setImage('uploads/referrers/alexander.jpeg');
        $recommendation2->setName('Alexander Nwokorie');
        $recommendation2->setPosition('Backend Developer | PHP | Laravel | Symfony | VueJS | React | WordPress');
        $recommendation2->setRecommendation("I had the pleasure of attending a tech academy with Elena, and I can confidently say she is an exceptional professional. Elena is not only hardworking and dedicated but also brings a positive and friendly energy to any project; she is a very good listener as well and very punctual in classes. As a team partner, she collaborates seamlessly, demonstrating a strong work ethic and a great sense of humor. Her openness to conversations makes her not just a valuable colleague but also a joy to work with. 
                                                           I highly recommend Elena for any team or project fortunate enough to have her.");
        $manager->persist($recommendation2);


        $recommendation3 = new Recommendations();
        $recommendation3->setImage('uploads/referrers/emmanuel.jpeg');
        $recommendation3->setName('Emmanuel Kristiyefunmi');
        $recommendation3->setPosition('Senior Web Developer ');
        $recommendation3->setRecommendation("I had the pleasure of studying alongside Victoria at Jagaad Academy, where we were both enrolled in the Symfony Backend Developer program. During our time together, I was consistently impressed by Victoria's intelligence, work ethic, and dedication to her studies. 
                                                          She was always willing to go the extra mile, and she was always eager to learn and help her classmates.
                                                          One of the things that I most admired about Victoria was her ability to think critically and solve problems creatively. She was always able to see the big picture, and she was able to come up with innovative solutions to complex challenges. She was also a great communicator, and she was able to clearly articulate her ideas both verbally and in writing. 
                                                          In addition to her academic skills, Victoria is also a highly motivated and results-oriented individual. She is always setting ambitious goals for herself, and she is always looking for ways to improve her skills and knowledge. She is also a team player, and she is always willing to help others succeed. 
                                                          I have no doubt that Victoria will be successful in any company that she chooses. She is a talented and intelligent individual with a strong work ethic and a passion for learning. I highly recommend Victoria for any position that she is applying for.
                                                          ");
        $manager->persist($recommendation3);

        $recommendation4 = new Recommendations();
        $recommendation4->setImage('uploads/referrers/ruth.jpeg');
        $recommendation4->setName('Ruth Usoro');
        $recommendation4->setPosition('Club Ambassador @Technovation Girls|| 
                                              Software Engineer Expert');
        $recommendation4->setRecommendation("I strongly recommend Victoria for her strong attention for details. Her meticulous approach to task and projects ensured accuracy and high quality results.
                                                          During my time in school Victoria consistently demonstrated a growth mindset, eagerly seeking opportunities to expand their skills and knowledge.
                                                          I so much love her curiosity to learning new thing. I strong Recommend Victoria");

        $manager->persist($recommendation4);

        $manager->flush();
    }
}
