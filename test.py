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

# Human-like commit message variations
commit_messages = {
    "home.html": [
        "Fixed the layout issue on the homepage, making it more user-friendly",
        "Updated homepage text to better explain the purpose of the platform",
        "Improved the header section for better visibility",
        "Made some minor tweaks to the homepage to improve navigation"
    ],
    "job_search.html": [
        "Refined the job search filters for a more accurate search experience",
        "Updated the job search form to include new filters like job type and location",
        "Improved the styling of the job search section to make it more visually appealing",
        "Fixed a minor issue in the job search results display"
    ],
    "post_a_job.html": [
        "Updated the post a job form to reflect the latest requirements",
        "Revised the job posting form layout for better user experience",
        "Added new fields to the job posting form to allow employers to specify more details"
    ],
    "browse_jobs.html": [
        "Improved job listing layout for better readability",
        "Added pagination to job listings to improve page load times",
        "Refined the job filtering options on the browse jobs page"
    ],
    "create_account.html": [
        "Revised account creation form with clearer instructions",
        "Improved the styling of the account creation form to match the platform's theme"
    ],
    "login.html": [
        "Made login page more responsive for mobile users",
        "Updated the login page to include a 'remember me' option"
    ],
    "my_profile.html": [
        "Added an option for users to upload a profile picture",
        "Improved profile page layout for better readability"
    ],
    "job_alerts.html": [
        "Enhanced the job alert system to include daily notifications",
        "Fixed a bug in the job alert setup that was preventing alerts from being sent"
    ],
    "employer_dashboard.html": [
        "Updated employer dashboard to display more relevant job metrics",
        "Revised the employer dashboard layout to improve ease of use"
    ],
    "resume_builder.html": [
        "Improved the resume builder UI to make it more intuitive",
        "Updated the resume builder to allow users to export to PDF"
    ],
    "job_application.html": [
        "Fixed an issue with the job application form submission process",
        "Revised the job application form to include additional fields for applicants"
    ],
    "company_profiles.html": [
        "Updated company profiles with new branding and company information",
        "Revised the layout of the company profile page for better organization"
    ],
    "salary_calculator.html": [
        "Updated salary calculator to reflect the latest salary data",
        "Fixed some layout issues on the salary calculator page"
    ],
    "career_advice.html": [
        "Added a new section on career advice for job seekers",
        "Updated the career advice section to include tips on remote work"
    ],
    "faq.html": [
        "Updated the FAQ section with answers to common user questions",
        "Refined the FAQ section layout for easier navigation"
    ],
    "contact_us.html": [
        "Updated the contact form to include a subject field",
        "Fixed a styling issue with the contact page form"
    ],
    "terms_and_conditions.html": [
        "Revised the terms and conditions based on new legal guidelines",
        "Updated the terms and conditions to reflect changes in privacy policy"
    ],
    "privacy_policy.html": [
        "Updated the privacy policy to include new data protection regulations",
        "Revised privacy policy wording for clarity"
    ]
}

# Change the content of HTML files continuously with some modifications
def modify_html_page(page):
    with open(page, "a") as file:
        # Select a human-like modification message for the file
        modification_type = random.choice(commit_messages[page])
        content = f"\n<!-- {modification_type} at {time.ctime()} -->\n"
        file.write(content)
    return modification_type

# Git commit function with versioned meaningful messages
def git_commit(page, modification_type):
    # Increment the version number for the page
    version = file_versions[page]
    file_versions[page] += 1
    
    # Create the commit message with versioning
    commit_message = f"Modified {page}: {modification_type} on {time.strftime('%b %d')} v{version}"
    
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
