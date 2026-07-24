<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * All demo data is literal. Nothing here may use Faker, the current time, or
 * any source of randomness — visual diff depends on two builds of one commit
 * producing byte-identical pages.
 *
 * Re-running the seeder resets the catalog to this exact state, which is what
 * a base-preview refresh should do.
 */
class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // Bcrypt of "password", precomputed so the stored row is identical on
        // every run. Credentials are meant to be typed on camera.
        DB::table('users')->upsert([[
            'id' => 1,
            'name' => 'Demo Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$UNbWEJXvG/V8Qhl4tneb0u6ZobyXfoOUUMPl87wlKYBesWrd8fhFe',
        ]], ['id'], ['name', 'email', 'password']);

        DB::table('conference_sessions')->delete();
        DB::table('speakers')->delete();
        DB::table('tracks')->delete();

        DB::table('tracks')->insert([
            ['id' => 1, 'name' => 'Framework & Core',        'slug' => 'framework-core',        'color' => '#6366f1'],
            ['id' => 2, 'name' => 'Architecture & Patterns', 'slug' => 'architecture-patterns', 'color' => '#0ea5e9'],
            ['id' => 3, 'name' => 'Testing & Quality',       'slug' => 'testing-quality',       'color' => '#22c55e'],
            ['id' => 4, 'name' => 'DevOps & Deployment',     'slug' => 'devops-deployment',     'color' => '#f59e0b'],
            ['id' => 5, 'name' => 'Frontend & Livewire',     'slug' => 'frontend-livewire',     'color' => '#ec4899'],
        ]);

        $speakers = [
            [1, 'Elena Vasquez', 'elena-vasquez', 'Principal Engineer', 'Meridian Labs', 'Elena has shipped Laravel applications since version 4.2 and now leads the platform group at Meridian Labs. She writes about long-lived codebases and the people who inherit them.'],
            [2, 'Tom Okafor', 'tom-okafor', 'CTO', 'Brightline', 'Tom runs engineering at Brightline, where a team of nine ships to production forty times a week. He is a loud advocate for boring technology and short-lived branches.'],
            [3, 'Sofie Andersen', 'sofie-andersen', 'Senior Developer', 'Nordwind Digital', 'Sofie builds booking systems for the travel industry and maintains two open source Dusk plugins. She speaks regularly on browser testing and developer ergonomics.'],
            [4, 'Marcus Reid', 'marcus-reid', 'Staff Engineer', 'Cobalt Systems', 'Marcus spent five years scaling a monolith to eleven million users without a rewrite. His current obsession is long-running PHP and the things it breaks.'],
            [5, 'Yuki Tanaka', 'yuki-tanaka', 'Lead Developer', 'Papercrane', 'Yuki leads a four-person product team and cares deeply about how little JavaScript an application can get away with. Previously she built design tooling at a printing company.'],
            [6, 'Amara Diallo', 'amara-diallo', 'Engineering Manager', 'Halcyon', 'Amara manages three product squads and still commits every week. She talks about the seams between architecture and team structure.'],
            [7, 'Piotr Kowalczyk', 'piotr-kowalczyk', 'Backend Architect', 'Ferrous', 'Piotr designs backends for logistics companies and has strong opinions about aggregate boundaries. He co-organises a monthly PHP meetup in Wrocław.'],
            [8, 'Lucia Moretti', 'lucia-moretti', 'Open Source Maintainer', 'Independent', 'Lucia maintains a family of admin-panel packages used by several thousand applications. She funds the work through sponsorships and consulting.'],
            [9, 'Dev Sharma', 'dev-sharma', 'Platform Engineer', 'Skyfield', 'Dev builds internal platforms so product teams never have to think about infrastructure. He has migrated the same application to serverless twice, in both directions.'],
            [10, 'Hannah Berg', 'hannah-berg', 'API Lead', 'Klarwerk', 'Hannah owns a public API consumed by four hundred integrators and takes backwards compatibility personally. She writes a newsletter on API versioning.'],
            [11, 'James O\'Donnell', 'james-odonnell', 'Senior Engineer', 'Peat & Pixel', 'James builds notification-heavy products for the events industry. He believes every unread badge is a design decision someone should have to defend.'],
            [12, 'Renata Souza', 'renata-souza', 'Tech Lead', 'Verdant Software', 'Renata leads backend development on an agricultural marketplace spanning three currencies and two hemispheres. Value objects saved her team, and she has the diff to prove it.'],
            [13, 'Karl Lindqvist', 'karl-lindqvist', 'Developer Advocate', 'Stackform', 'Karl spends his days reproducing other people\'s bugs and turning them into documentation. He collects examples of flaky tests the way others collect stamps.'],
            [14, 'Aisha Rahman', 'aisha-rahman', 'Principal Consultant', 'Rahman & Co', 'Aisha consults for teams adopting event-driven architectures, usually after the first attempt. Her talks are built from anonymised war stories.'],
            [15, 'Nikolai Petrov', 'nikolai-petrov', 'Performance Engineer', 'Quickstep', 'Nikolai profiles queues and databases for a living and has never met a p99 he trusted. He built the internal load-testing rig at Quickstep.'],
            [16, 'Grace Liu', 'grace-liu', 'Full-Stack Developer', 'Lantern Apps', 'Grace works across the stack on a component library shared by six products. She cares about the moment a pattern stops scaling and what to do next.'],
            [17, 'María Fernanda Gutiérrez de la Torre-Albarracín', 'maria-fernanda-gutierrez-de-la-torre-albarracin', 'Director of Engineering', 'Solstice Interactive', 'María Fernanda directs engineering for a multi-tenant SaaS platform serving agencies in nine countries. She has run every tenancy model in production and kept the receipts.'],
            [18, 'Ben Carter', 'ben-carter', 'Senior Developer', 'Foundry Nine', 'Ben writes tests first and apologises for it later. He works on financial reporting software where a rounding error is a resignation letter.'],
            [19, 'Ingrid Halvorsen', 'ingrid-halvorsen', 'Database Specialist', 'Fjordbyte', 'Ingrid has tuned MySQL for newsrooms, banks, and one aquarium. She thinks most scaling problems are indexing problems wearing a costume.'],
            [20, 'Sam Ibrahim', 'sam-ibrahim', 'DevOps Lead', 'Cloudmason', 'Sam leads a platform team that deploys two hundred times a month without a deploy engineer. He came to DevOps from support and has never forgotten it.'],
            [21, 'Chloe Martin', 'chloe-martin', 'Frontend Engineer', 'Atelier Web', 'Chloe builds interfaces for cultural institutions where the design brief arrives as a PDF of a poster. She specialises in Tailwind and diplomatic email.'],
            [22, 'Diego Ramírez', 'diego-ramirez', 'Software Architect', 'Cerro Alto', 'Diego splits monoliths for a living, slowly and on purpose. His current project has been "about to be extracted into services" for four productive years.'],
            [23, 'Priya Raghunathan', 'priya-raghunathan', 'Staff Engineer', 'Junction Works', 'Priya works on scheduling and calendar infrastructure, which means she works on time zones. Her test suite freezes the clock, and so does her heart.'],
            [24, 'Oliver Bennett', 'oliver-bennett', 'Head of Engineering', 'Marlowe & Finch', 'Oliver leads engineering at a legal-tech firm with a codebase old enough to vote. He talks about refactoring as a negotiation, not a rescue.'],
            [25, 'Fatima Zahra El Amrani', 'fatima-zahra-el-amrani', 'Senior Backend Developer', 'Casablanca Codeworks', 'Fatima Zahra builds payment integrations and breaks her own tests for sport with mutation testing. She mentors two junior developer cohorts a year.'],
            [26, 'Erik Johansson', 'erik-johansson', 'Testing Evangelist', 'Provable', 'Erik has introduced Pest to eleven teams and counting. He measures a test suite by how it reads aloud in a code review.'],
            [27, 'Nadia Chen', 'nadia-chen', 'Product Engineer', 'Mosaic Labs', 'Nadia sits between design and backend and refuses to pick a side. She profiles rendering performance the way backend engineers profile queries.'],
            [28, 'Liam Gallagher-Whyte', 'liam-gallagher-whyte', 'Senior Consultant', 'Ashgrove', 'Liam untangles distributed workflows for insurance and logistics clients. He has drawn the same saga diagram on forty different whiteboards.'],
            [29, 'Rosa Delgado', 'rosa-delgado', 'Livewire Specialist', 'Studio Delgado', 'Rosa runs a two-person studio building Livewire applications end to end. She livestreams the unglamorous parts on Thursdays.'],
            [30, 'Anders Møller', 'anders-moller', 'Infrastructure Engineer', 'Grønbyte', 'Anders keeps a fleet of containerised Laravel apps running for Scandinavian retailers. He believes Dockerfiles are documentation that happens to execute.'],
            [31, 'Tara Singh', 'tara-singh', 'Engineering Coach', 'Clearpath', 'Tara coaches teams through architecture reviews and postmortems. Her favourite question is "what would make this boring?"'],
            [32, 'Felix Braun', 'felix-braun', 'Package Author', 'Braunwerk', 'Felix maintains a dozen small Laravel packages and deletes one every year on principle. He writes about the cost side of the dependency ledger.'],
            [33, 'Zoe Papadopoulos', 'zoe-papadopoulos', 'Senior Developer', 'Aegean Digital', 'Zoe brought static analysis to a fifteen-year-old codebase and lived to give a talk about it. She works on maritime logistics software in Piraeus.'],
            [34, 'Henry Ashford', 'henry-ashford', 'Legacy Rescue Consultant', 'Ashford Analytics', 'Henry specialises in Laravel upgrades that were postponed three majors too long. His record is 4.2 to 12 in one engagement, and he does not recommend it.'],
            [35, 'Mei-Ling Wong', 'mei-ling-wong', 'Security Engineer', 'Bastion Row', 'Mei-Ling reviews Laravel applications for security and finds the secrets in the repo every single time. She builds tooling that makes the safe path the lazy path.'],
            [36, 'Jakob Novak', 'jakob-novak', 'Systems Engineer', 'Ostrava Digital', 'Jakob looks after scheduled jobs and message queues for an energy company. He has strong feelings about idempotency and a mug that says "at least once."'],
            [37, 'Camille Dubois', 'camille-dubois', 'API Designer', 'Maison Code', 'Camille designs APIs and the forms that feed them, and thinks the two are the same discipline. She previously wrote documentation for a CAD company.'],
            [38, 'Ade Balogun', 'ade-balogun', 'Senior Engineer', 'Lagos Loft', 'Ade builds fintech products and snapshot-tests every template that touches money. He co-hosts a podcast on African tech teams.'],
            [39, 'Signe Eriksen', 'signe-eriksen', 'Accessibility Lead', 'Tilgang', 'Signe audits public-sector applications for accessibility compliance. She would like you to know that your click handler needs a keyboard equivalent.'],
            [40, 'Robert Kaczmarek', 'robert-kaczmarek', 'Site Reliability Engineer', 'Uptime Guild', 'Robert carries the pager for two hundred client applications. His talks are the incident reports he wishes he had read beforehand.'],
        ];

        DB::table('speakers')->insert(array_map(fn (array $s) => [
            'id' => $s[0],
            'name' => $s[1],
            'slug' => $s[2],
            'title' => $s[3],
            'company' => $s[4],
            'bio' => $s[5],
            // Priya Raghunathan (23) deliberately has no headshot; the layout
            // needs somewhere fragile to break.
            'headshot_path' => $s[0] === 23 ? null : 'images/speakers/' . $s[2] . '.svg',
        ], $speakers));

        // Two days, six slots, five rooms — one room per track. Rows are
        // [id, title, slug, abstract, speaker_id, track_id, room, starts_at, level].
        $sessions = [
            // ── Track 1 · Framework & Core · Auditorium ──────────────────
            [1, 'Laravel 12 in Production: What Changed', 'laravel-12-in-production', 'A tour of the changes in Laravel 12 that actually matter once real traffic arrives. We cover the upgrade path, the deprecations that bite, and the features worth adopting in the first month.', 1, 1, 'Auditorium', '2026-09-15 09:00:00', 'intermediate'],
            [2, 'Eloquent Under the Hood', 'eloquent-under-the-hood', 'What actually happens between $user->posts and the SQL in your query log. Attribute casting, relation loading, and the query builder internals that explain Eloquent\'s sharp edges.', 2, 1, 'Auditorium', '2026-09-15 10:15:00', 'advanced'],
            [3, 'The Service Container, Demystified', 'service-container-demystified', 'The container is the piece of Laravel most developers use all day without ever calling it directly. This session builds a mental model from constructor injection up to contextual binding, with no magic left unexplained.', 3, 1, 'Auditorium', '2026-09-15 11:30:00', 'beginner'],
            [4, 'Queues at Scale: Beyond php artisan queue:work', 'queues-at-scale', 'When one worker becomes forty, new failure modes arrive: poison jobs, uneven backlogs, and retries that make things worse. Hard-won patterns for running large queue fleets without babysitting them.', 15, 1, 'Auditorium', '2026-09-15 13:30:00', 'advanced'],
            [5, 'Collections: The Missing Manual', 'collections-the-missing-manual', 'Fifty collection methods in an hour, organised by the problem they solve rather than the alphabet. Includes the handful you should probably stop using.', 16, 1, 'Auditorium', '2026-09-15 14:45:00', 'beginner'],
            [6, 'Rate Limiting Real Traffic', 'rate-limiting-real-traffic', 'Rate limiters look simple until a customer\'s integration retries at full speed for six hours. Designing limits, headers, and error responses that protect the platform without punishing well-behaved clients.', 10, 1, 'Auditorium', '2026-09-15 16:00:00', 'intermediate'],
            [7, 'Octane in Anger: Long-Running Laravel', 'octane-in-anger', 'Octane changes the rules: state survives between requests, and so do your mistakes. What broke when we moved a high-traffic monolith to Octane, and the checklist we wish we had started with.', 4, 1, 'Auditorium', '2026-09-16 09:00:00', 'advanced'],
            [8, 'Understanding the Request Lifecycle', 'understanding-the-request-lifecycle', 'From public/index.php to the response, one stop at a time. Middleware, service providers, and routing explained in the order they actually run.', 5, 1, 'Auditorium', '2026-09-16 10:15:00', 'beginner'],
            [9, 'Scheduled Tasks Without Surprises', 'scheduled-tasks-without-surprises', 'The scheduler is easy to write and hard to operate: overlapping runs, missed windows, and jobs that silently stopped in March. Patterns for schedules you can trust and monitoring that tells you when not to.', 36, 1, 'Auditorium', '2026-09-16 11:30:00', 'intermediate'],
            [10, 'Filesystem Abstractions That Don\'t Leak', 'filesystem-abstractions-that-dont-leak', 'Flysystem promises that local disk and S3 look the same, and mostly keeps it. This talk is about the "mostly": streaming, visibility, temporary URLs, and testing storage code honestly.', 9, 1, 'Auditorium', '2026-09-16 13:30:00', 'intermediate'],
            [11, 'Notifications: Email, Slack, and Everything After', 'notifications-email-slack-and-after', 'One notification class, five channels, and a user who wants none of them. Building a notification layer with preferences, digests, and delivery you can audit.', 11, 1, 'Auditorium', '2026-09-16 14:45:00', 'beginner'],
            [12, 'Upgrading Legacy Apps to Laravel 12', 'upgrading-legacy-apps-to-laravel-12', 'A field guide to multi-major upgrades: sequencing, shims, and the tests to write before you touch composer.json. Based on a dozen real engagements, including the ones that went badly.', 34, 1, 'Auditorium', '2026-09-16 16:00:00', 'intermediate'],

            // ── Track 2 · Architecture & Patterns · Room 201 ─────────────
            [13, 'Actions, Not Controllers', 'actions-not-controllers', 'Single-purpose action classes give you thin HTTP handlers and business logic you can call from anywhere. Where the pattern shines, where it turns into ravioli, and how to keep the boundary honest.', 6, 2, 'Room 201', '2026-09-15 09:00:00', 'intermediate'],
            [14, 'Domain-Driven Laravel Without the Ceremony', 'domain-driven-laravel-without-ceremony', 'You do not need seventeen layers to use domain thinking. Bounded contexts, ubiquitous language, and aggregates translated into plain Laravel — and the parts of the blue book to politely ignore.', 7, 2, 'Room 201', '2026-09-15 10:15:00', 'advanced'],
            [15, 'The Repository Pattern Is Dead, Long Live Eloquent', 'repository-pattern-is-dead', 'Wrapping Eloquent in repositories usually buys abstraction you never cash in. What the pattern was for, why Active Record changes the trade, and lighter seams for the tests you actually write.', 8, 2, 'Room 201', '2026-09-15 11:30:00', 'intermediate'],
            [16, 'Modular Monoliths in Practice', 'modular-monoliths-in-practice', 'Module boundaries inside one deployable: enforcing them, testing them, and resisting the microservices itch. A four-year case study with the metrics that kept us honest.', 22, 2, 'Room 201', '2026-09-15 13:30:00', 'advanced'],
            [17, 'Value Objects and Casts: Types for Your Domain', 'value-objects-and-casts', 'Money is not a float and an email is not a string. Using custom casts to give domain concepts real types, with the migration strategy for a codebase that grew up without them.', 12, 2, 'Room 201', '2026-09-15 14:45:00', 'intermediate'],
            [18, 'Event Sourcing: A Gentle Introduction', 'event-sourcing-gentle-introduction', 'Event sourcing explained without a message broker diagram: what it costs, what it buys, and a small real feature built both ways so you can see the difference.', 14, 2, 'Room 201', '2026-09-15 16:00:00', 'beginner'],
            [19, 'API Design for Humans', 'api-design-for-humans', 'Integrators judge your API in the first ten minutes. Naming, pagination, errors, and versioning decisions that survive contact with four hundred external developers.', 37, 2, 'Room 201', '2026-09-16 09:00:00', 'intermediate'],
            [20, 'Multi-Tenancy: Picking Your Poison', 'multi-tenancy-picking-your-poison', 'Shared schema, schema-per-tenant, or database-per-tenant — every option is a different set of regrets. A decision framework from someone who has operated all three at once.', 17, 2, 'Room 201', '2026-09-16 10:15:00', 'advanced'],
            [21, 'Refactoring Toward Boring Code', 'refactoring-toward-boring-code', 'Cleverness is a loan and the interest rate is your onboarding time. Practical refactoring moves that trade elegance for legibility, and how to sell them to a team that is proud of the clever version.', 24, 2, 'Room 201', '2026-09-16 11:30:00', 'intermediate'],
            [22, 'Saga Patterns with Laravel Queues', 'saga-patterns-with-laravel-queues', 'Multi-step workflows across services fail in the middle, and someone has to clean up. Implementing sagas and compensating actions with nothing more exotic than queued jobs and a state column.', 28, 2, 'Room 201', '2026-09-16 13:30:00', 'advanced'],
            [23, 'When to Reach for a Package (and When Not To)', 'when-to-reach-for-a-package', 'Every dependency is a tiny merger with a stranger\'s roadmap. A framework for the build-versus-install decision, from a package author who often argues against installing his own work.', 32, 2, 'Room 201', '2026-09-16 14:45:00', 'beginner'],
            [24, 'The Architecture Review: A Live Walkthrough', 'architecture-review-live-walkthrough', 'A real architecture review of a volunteer\'s application, live, with the mistakes left in. See the questions that surface risk fastest and the diagrams worth drawing before the meeting.', 31, 2, 'Room 201', '2026-09-16 16:00:00', 'intermediate'],

            // ── Track 3 · Testing & Quality · Room 202 ───────────────────
            [25, 'Pest in Practice', 'pest-in-practice', 'From your first expectation to a suite the whole team can read aloud. Datasets, higher-order tests, and the plugins that earn their place.', 26, 3, 'Room 202', '2026-09-15 09:00:00', 'beginner'],
            [26, 'Testing Eloquent Without Hitting the Database', 'testing-eloquent-without-the-database', 'Most model tests do not need MySQL, and the suite would be ten times faster without it. Where in-memory doubles work, where they lie to you, and the boundary where a real database earns its keep.', 18, 3, 'Room 202', '2026-09-15 10:15:00', 'intermediate'],
            [27, 'Mutation Testing: Who Tests the Tests?', 'mutation-testing-who-tests-the-tests', 'Coverage says your code ran; mutation testing says your assertions noticed. Introducing Infection to a Laravel codebase without drowning in noise, and what the surviving mutants taught us.', 25, 3, 'Room 202', '2026-09-15 11:30:00', 'advanced'],
            [28, 'Static Analysis: Larastan From Zero', 'static-analysis-larastan-from-zero', 'Taking a real application from level 0 to level 8, one baseline at a time. Which errors to fix, which to ignore forever, and how to keep the team from turning it all off.', 33, 3, 'Room 202', '2026-09-15 13:30:00', 'intermediate'],
            [29, 'Contract Testing Your JSON APIs', 'contract-testing-your-json-apis', 'Your OpenAPI spec and your actual responses drifted apart months ago. Contract tests that pin the two together, catch breaking changes in CI, and double as documentation.', 35, 3, 'Room 202', '2026-09-15 14:45:00', 'intermediate'],
            [30, 'Flaky Tests and How They Happen', 'flaky-tests-and-how-they-happen', 'A taxonomy of flakiness: time, order, shared state, and the network. Real examples of each, how to reproduce them on demand, and the quarantine process that keeps them from training your team to ignore red.', 13, 3, 'Room 202', '2026-09-15 16:00:00', 'beginner'],
            [31, 'Browser Testing with Dusk That Doesn\'t Hurt', 'browser-testing-with-dusk', 'Dusk suites usually die of slowness and flakiness within a year. Page objects, seeded states, and selector discipline that kept ours alive through three redesigns.', 3, 3, 'Room 202', '2026-09-16 09:00:00', 'intermediate'],
            [32, 'Test Data Builders vs Factories', 'test-data-builders-vs-factories', 'Factories are great until every test needs six related models in a specific state. Builder patterns that make complex arrangements readable, and when plain factories are still the right call.', 18, 3, 'Room 202', '2026-09-16 10:15:00', 'intermediate'],
            [33, 'Snapshot Testing Blade Views', 'snapshot-testing-blade-views', 'Snapshot tests catch template regressions your assertions never look for. Keeping snapshots reviewable, deterministic, and small enough that people read the diff instead of regenerating it.', 38, 3, 'Room 202', '2026-09-16 11:30:00', 'beginner'],
            [34, 'CI Pipelines Developers Actually Trust', 'ci-pipelines-developers-trust', 'A pipeline is a product and your team are its unwilling users. Speed budgets, flake quarantine, and failure messages that tell you what to do next — the difference between a gate and an obstacle.', 26, 3, 'Room 202', '2026-09-16 13:30:00', 'advanced'],
            [35, 'Testing Time Itself: Clocks, Freezes, and Travel', 'testing-time-itself', 'Every bug report that starts with "only on the last day of the month" is a time bug. Freezing, travelling, and injecting clocks in Laravel, plus the calendar edge cases that find you eventually.', 23, 3, 'Room 202', '2026-09-16 14:45:00', 'intermediate'],
            [36, 'Accessibility Testing as Part of QA', 'accessibility-testing-as-part-of-qa', 'Accessibility regressions ship because nobody\'s pipeline was looking. Wiring axe and Lighthouse into CI, triaging what they find, and the manual checks no scanner replaces.', 39, 3, 'Room 202', '2026-09-16 16:00:00', 'beginner'],

            // ── Track 4 · DevOps & Deployment · Room 310 ─────────────────
            [37, 'Zero-Downtime Deploys on a Budget', 'zero-downtime-deploys-on-a-budget', 'You do not need a platform team to stop dropping requests at deploy time. Symlink switches, health checks, and migration strategies that work on two virtual machines and a load balancer.', 20, 4, 'Room 310', '2026-09-15 09:00:00', 'intermediate'],
            [38, 'Docker for Laravel Developers Who Don\'t Love Docker', 'docker-for-laravel-developers', 'A working mental model of images, layers, and volumes for people who just want php artisan serve back. We build a production-ready Laravel image step by step and explain every line.', 30, 4, 'Room 310', '2026-09-15 10:15:00', 'beginner'],
            [39, 'Horizon in Production', 'horizon-in-production', 'Horizon\'s dashboard is lovely right up until the backlog isn\'t. Balancing strategies, memory leaks, deploy-time draining, and the metrics that predict trouble before the graphs turn red.', 15, 4, 'Room 310', '2026-09-15 11:30:00', 'advanced'],
            [40, 'Secrets Management Beyond .env', 'secrets-management-beyond-env', 'The .env file was never meant to hold production credentials for nine services. Rotation, injection, and audit trails with tooling small teams can actually run.', 35, 4, 'Room 310', '2026-09-15 13:30:00', 'intermediate'],
            [41, 'Database Migrations at 2 a.m.: A Postmortem', 'database-migrations-at-2am', 'A locked table, a queue of writes, and a migration that could not be rolled back. The full anatomy of one bad night, and the expand-and-contract discipline that has prevented a repeat.', 40, 4, 'Room 310', '2026-09-15 14:45:00', 'intermediate'],
            [42, 'Observability: Logs, Traces, and the Metrics That Matter', 'observability-logs-traces-metrics', 'You cannot fix what you cannot see, and you cannot afford to see everything. Instrumenting a Laravel application with intent: what to log, what to trace, and what to let go.', 36, 4, 'Room 310', '2026-09-15 16:00:00', 'advanced'],
            [43, 'Preview Environments and the Death of Staging', 'preview-environments-death-of-staging', 'One shared staging server means every release is a traffic jam. What changes — in QA, in review, in stakeholder sign-off — when every pull request gets its own environment with its own database.', 2, 4, 'Room 310', '2026-09-16 09:00:00', 'intermediate'],
            [44, 'Kubernetes: Do You Actually Need It?', 'kubernetes-do-you-need-it', 'An honest sizing exercise: the workloads where Kubernetes pays rent, the ones where a VM and a deploy script win, and the migration costs nobody puts on the slide.', 20, 4, 'Room 310', '2026-09-16 10:15:00', 'intermediate'],
            [45, 'Scaling MySQL Before You Shard', 'scaling-mysql-before-you-shard', 'Sharding is the last resort, not the next step. Indexing, read replicas, connection pooling, and query shape — the sequence of cheaper moves that usually makes the problem go away.', 19, 4, 'Room 310', '2026-09-16 11:30:00', 'advanced'],
            [46, 'Blue-Green Data: Deploying Schema Changes Safely', 'blue-green-data-schema-changes', 'Application code rolls back in seconds; schema changes do not. Expand-and-contract migrations, dual writes, and verification steps for changing a live schema without a maintenance window.', 30, 4, 'Room 310', '2026-09-16 13:30:00', 'advanced'],
            [47, 'Serverless Laravel with Vapor: One Year Later', 'serverless-laravel-with-vapor', 'The invoice, the cold starts, the things we stopped worrying about entirely. A twelve-month retrospective on moving a production workload to Vapor, with real numbers.', 9, 4, 'Room 310', '2026-09-16 14:45:00', 'intermediate'],
            [48, 'Incident Response for Small Teams', 'incident-response-for-small-teams', 'You do not need a follow-the-sun rotation to handle incidents well. Lightweight on-call, blameless reviews, and runbooks sized for a team of five.', 40, 4, 'Room 310', '2026-09-16 16:00:00', 'beginner'],

            // ── Track 5 · Frontend & Livewire · Workshop A ───────────────
            [49, 'Livewire 3 Deep Dive', 'livewire-3-deep-dive', 'Past the counter demo: nested components, lazy loading, and the request payloads Livewire actually sends. A close look at the wire so you can debug it when it frays.', 29, 5, 'Workshop A', '2026-09-15 09:00:00', 'intermediate'],
            [50, 'Tailwind v4: What Actually Changed', 'tailwind-v4-what-actually-changed', 'The v4 engine replaced the config file with CSS and broke half the blog posts you learned from. The new mental model, the migration path, and the features worth the upgrade on their own.', 21, 5, 'Workshop A', '2026-09-15 10:15:00', 'beginner'],
            [51, 'Alpine.js Patterns for Server-Side Devs', 'alpine-js-patterns-server-side', 'Enough Alpine to build dropdowns, dialogs, and inline edits — without adopting a frontend build identity. Patterns that stay readable when the component grows.', 27, 5, 'Workshop A', '2026-09-15 11:30:00', 'intermediate'],
            [52, 'Blade Components at Scale', 'blade-components-at-scale', 'Six products, one component library, and every lesson learned the hard way. Naming, slots, props discipline, and the deprecation process for a component someone loves.', 16, 5, 'Workshop A', '2026-09-15 13:30:00', 'intermediate'],
            [53, 'Accessible by Default: Building UI That Works for Everyone', 'accessible-by-default', 'Accessibility is cheapest at the component level, where you fix it once. Focus management, semantics, and contrast built into your base components so product teams inherit it for free.', 39, 5, 'Workshop A', '2026-09-15 14:45:00', 'beginner'],
            [54, 'Islands of Interactivity: How Much JavaScript Do You Need?', 'islands-of-interactivity', 'Most pages need three interactive islands, not a single-page application. Choosing between Blade, Alpine, Livewire, and a framework — per feature, not per project.', 5, 5, 'Workshop A', '2026-09-15 16:00:00', 'intermediate'],
            [55, 'Filament Beyond CRUD', 'filament-beyond-crud', 'Filament will scaffold your admin panel in an afternoon; then the real requests arrive. Custom pages, actions, and multi-step flows that keep the panel coherent as it grows into an application.', 8, 5, 'Workshop A', '2026-09-16 09:00:00', 'intermediate'],
            [56, 'Real-Time UIs with Reverb', 'real-time-uis-with-reverb', 'WebSockets without the third-party bill. Presence, broadcasting, and reconnection handling with Reverb, plus the fallback strategy for the corporate networks that eat your sockets.', 29, 5, 'Workshop A', '2026-09-16 10:15:00', 'advanced'],
            [57, 'Design Systems for Blade', 'design-systems-for-blade', 'Turning a folder of partials into a system: tokens, variants, and documentation that stays true. How a design system survives contact with deadlines, and what to do when it doesn\'t.', 21, 5, 'Workshop A', '2026-09-16 11:30:00', 'intermediate'],
            [58, 'Optimising Largest Contentful Paint on Laravel Apps', 'optimising-largest-contentful-paint', 'LCP is won and lost in the first 1,200 milliseconds, most of it server-side. Response streaming, image priorities, and font strategy for Blade applications, measured on real pages.', 27, 5, 'Workshop A', '2026-09-16 13:30:00', 'advanced'],
            [59, 'Forms That Don\'t Fight Back', 'forms-that-dont-fight-back', 'Validation timing, error placement, and state preservation — the details that decide whether a form feels helpful or hostile. Server-rendered patterns first, JavaScript only where it earns its place.', 37, 5, 'Workshop A', '2026-09-16 14:45:00', 'beginner'],
            [60, 'SVG, Icons, and the Asset Pipeline', 'svg-icons-and-the-asset-pipeline', 'Inline, sprite, or component — every icon strategy taxes you differently. A practical tour of SVG handling in a Vite-built Laravel app, ending with the setup we actually recommend.', 13, 5, 'Workshop A', '2026-09-16 16:00:00', 'beginner'],
        ];

        DB::table('conference_sessions')->insert(array_map(fn (array $s) => [
            'id' => $s[0],
            'title' => $s[1],
            'slug' => $s[2],
            'abstract' => $s[3],
            'speaker_id' => $s[4],
            'track_id' => $s[5],
            'room' => $s[6],
            'starts_at' => $s[7],
            'level' => $s[8],
        ], $sessions));
    }
}
