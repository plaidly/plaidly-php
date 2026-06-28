# Releasing `plaidly/plaidly-php`

Composer packages are served by **Packagist** straight from the git tags — no
artifact is uploaded. `composer.json` deliberately carries **no** `version`
field; the version comes from the tag.

Two workflows back this:

- `.github/workflows/ci.yml` — on push to `main` and PRs: validates
  `composer.json` and runs PHPUnit on PHP 8.1–8.4.
- `.github/workflows/release.yml` — on a `v*` tag: verifies semver, validates
  `composer.json`, runs PHPUnit, then (optionally) tells Packagist to refresh.

## One-time setup

1. Submit the package once at <https://packagist.org/packages/submit> using the
   repo URL `https://github.com/plaidly/plaidly-php`.
2. Enable auto-updates — preferred: install the **Packagist GitHub service
   hook** (Packagist shows the exact steps). With the hook installed, tags are
   picked up automatically and no secret is needed.
3. *(Optional, for the in-workflow refresh)* add GitHub secrets
   `PACKAGIST_USERNAME` and `PACKAGIST_API_TOKEN` (the token is on your
   Packagist *Profile → API Token* page). If unset, the release job logs a
   skip and Packagist's own crawler/webhook still picks the tag up.

## Cutting a release

```bash
git tag v0.2.1
git push origin main --tags
```

The **Release** workflow gates the tag on tests, then Packagist publishes
`v0.2.1`: <https://packagist.org/packages/plaidly/plaidly-php>.

Install/verify:

```bash
composer require plaidly/plaidly-php:^0.2
```

Tags are immutable once Packagist indexes them — bump the patch rather than
re-tagging.
