import os
import time
import random

# Define the list of HTML pages
html_pages = [
    "home.html", "job_search.html", "post_a_job.html", "browse_jobs.html",
    "create_account.html", "login.html", "my_profile.html", "job_alerts.html",
    "employer_dashboard.html", "resume_builder.html", "job_application.html",
    "company_profiles.html", "salary_calculator.html", "career_advice.html",
    "faq.html", "contact_us.html", "terms_and_conditions.html", "privacy_policy.html"
]

# Create a dictionary to keep track of version numbers for each file
file_versions = {page: 1 for page in html_pages}

# Casual commit message variations
commit_messages = {
    "home.html": [
        "Fixed the homepage layout, it looks better now.",
        "Tweaked the homepage a bit to make it nicer.",
        "Made some changes to the homepage design.",
        "Updated the homepage with new sections."
    ],
    "job_search.html": [
        "Changed the job search filters a little.",
        "Fixed a tiny issue with job search filters.",
        "Improved job search to make it work better.",
        "Added more filters to job search."
    ],
    "post_a_job.html": [
        "Updated the job posting form with new fields.",
        "Changed some stuff on the job post form.",
        "Fixed a bug with posting jobs.",
        "Reorganized the job posting form."
    ],
    "browse_jobs.html": [
        "Fixed job listing to show more things.",
        "Updated job listing to look nicer.",
        "Improved job list layout.",
        "Added better filtering to job listings."
    ],
    "create_account.html": [
        "Updated the account creation form.",
        "Made the sign up form clearer.",
        "Fixed some issues with the account creation page.",
        "Improved account creation form a little."
    ],
    "login.html": [
        "Made login page more user-friendly.",
        "Fixed a small issue with the login page.",
        "Updated login page styling.",
        "Made login page work better on mobile."
    ],
    "my_profile.html": [
        "Added profile picture upload option.",
        "Fixed some bugs on the profile page.",
        "Updated profile page layout.",
        "Made it easier to change profile details."
    ],
    "job_alerts.html": [
        "Fixed a bug with the job alert system.",
        "Made job alerts send better notifications.",
        "Updated job alerts to be more useful.",
        "Reworked the job alert system a bit."
    ],
    "employer_dashboard.html": [
        "Updated the employer dashboard.",
        "Improved how the employer dashboard looks.",
        "Fixed some layout issues on the employer dashboard.",
        "Made the employer dashboard easier to use."
    ],
    "resume_builder.html": [
        "Fixed a bug in the resume builder.",
        "Improved how the resume builder works.",
        "Updated the resume builder design.",
        "Made the resume builder easier to use."
    ],
    "job_application.html": [
        "Fixed issues with the job application form.",
        "Updated the job application page.",
        "Changed some things on the job application form.",
        "Fixed a bug with submitting job applications."
    ],
    "company_profiles.html": [
        "Updated company profile layout.",
        "Fixed some issues with company profiles.",
        "Revised the company profile page.",
        "Improved company profile display."
    ],
    "salary_calculator.html": [
        "Fixed layout issues on the salary calculator.",
        "Updated the salary calculator with new data.",
        "Improved salary calculator to make it more accurate.",
        "Tweaked the salary calculator design."
    ],
    "career_advice.html": [
        "Added new career advice tips.",
        "Updated career advice section.",
        "Reworked career advice page a bit.",
        "Added more content to career advice."
    ],
    "faq.html": [
        "Updated the FAQ section.",
        "Added more questions to the FAQ.",
        "Fixed some small issues in the FAQ.",
        "Revised the FAQ for better answers."
    ],
    "contact_us.html": [
        "Updated contact page form.",
        "Fixed the contact form layout.",
        "Reworked the contact page a bit.",
        "Updated the contact page design."
    ],
    "terms_and_conditions.html": [
        "Revised terms and conditions a little.",
        "Updated terms and conditions to include new info.",
        "Made small changes to the terms and conditions.",
        "Reworked the terms and conditions section."
    ],
    "privacy_policy.html": [
        "Updated privacy policy to make it clearer.",
        "Revised the privacy policy with new details.",
        "Made some changes to the privacy policy.",
        "Updated privacy policy wording."
    ]
}

# Change the content of HTML files continuously with some modifications
def modify_html_page(page):
    with open(page, "a") as file:
        # Select a casual modification message for the file
        modification_type = random.choice(commit_messages[page])
        content = f"\n<!-- {modification_type} -->\n"
        file.write(content)
    return modification_type

# Git commit function with versioned meaningful messages
def git_commit(page, modification_type):
    # Increment the version number for the page
    version = file_versions[page]
    file_versions[page] += 1
    
    # Create the commit message with versioning
    commit_message = f"Modified {page}: {modification_type} v{version}"
    
    os.system("git add .")
    os.system(f'git commit -m "{commit_message}"')
    os.system("git push")

# Main function to automate the process
def automate_commits():
    commits = 0
    start_time = time.time()
    while commits < 800:
        # Select a random HTML file to modify
        page = random.choice(html_pages)
        
        # Modify the selected HTML file and get the modification type
        modification_type = modify_html_page(page)
        
        # Commit the change to Git with a versioned and meaningful message
        git_commit(page, modification_type)
        
        # Wait for a short period before making the next change
        time.sleep(random.randint(25, 35))  # Random interval between 25 to 35 seconds
        
        commits += 1
        elapsed_time = time.time() - start_time
        print(f"Commit {commits}/800 completed. Elapsed time: {elapsed_time/3600:.2f} hours")
        
        if elapsed_time > 28800:  # 8 hours in seconds
            print("8 hours have passed. Stopping commits.")
            break

# Start the automated commit process
if __name__ == "__main__":
    automate_commits()
