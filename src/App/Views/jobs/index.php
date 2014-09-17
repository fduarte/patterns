<h2>Jobs</h2>

<h4><?= $jobs->name ?></h4>

<p>
<strong>Recruiter Information</strong><br />
<?= $jobs->recruiter->name ?>,
<?= $jobs->recruiter->age ?><br />
Rank: <?= $jobs->rank ?><br /> 
<address>
<?= $jobs->recruiter->address->streetAddress ?><br />
<?= $jobs->recruiter->address->city ?>,
<?= $jobs->recruiter->address->state ?>
<?= $jobs->recruiter->address->zip ?><br />
<?= $jobs->recruiter->address->country ?>
</address>
</p>

<p>
<strong>Applicant Information</strong><br />
<?= $jobs->applicant->name ?>,
<?= $jobs->applicant->age ?><br />
<a href="<?= $jobs->applicant->link ?>"><?= $jobs->applicant->link ?></a>
</p>
