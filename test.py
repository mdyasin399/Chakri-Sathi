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

# Change the content of HTML files continuously
def modify_html_page(page):
    with open(page, "a") as file:
        file.write(f"\n<!-- Modification at {time.ctime()} -->\n")

# Git commit function
def git_commit():
    os.system("git add .")
    os.system('git commit -m "Automated commit"')
    os.system("git push")

# Main function to automate the process
def automate_commits():
    commits = 0
    start_time = time.time()
    while commits < 800:
        # Select a random HTML file to modify
        page = random.choice(html_pages)
        
        # Modify the selected HTML file
        modify_html_page(page)
        
        # Commit the change to Git
        git_commit()
        
        # Wait for a short period before making the next change
        time.sleep(random.randint(25, 35))  # Random interval between 25 to 35 seconds to simulate randomness
        
        commits += 1
        elapsed_time = time.time() - start_time
        print(f"Commit {commits}/800 completed. Elapsed time: {elapsed_time/3600:.2f} hours")
        
        if elapsed_time > 28800:  # 8 hours in seconds
            print("8 hours have passed. Stopping commits.")
            break

# Start the automated commit process
if __name__ == "__main__":
    automate_commits()
