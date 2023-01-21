@props(['skills', 'projects'])
<section id="portfolio" class="section bg-light-primary dark:bg-dark-primary min-h[1400px]">
    <div class="container mx-auto">
        <div class="flex flex-col items-center text-center">
            <h2 class="section-title">Çalışmalarım</h2>
            <p class="subtitle">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas totam eaque similique distinctio,
                explicabo laborum necessitatibus, temporibus iusto fugiat veritatis itaque neque deleniti facilis illum
                ea harum amet quidem nulla.
            </p>
        </div>
    </div>
    <x-frontend.projects :skills="$skills" :projects="$projects" />
</section>
